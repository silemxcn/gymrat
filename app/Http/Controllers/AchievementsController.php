<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Achievement;
use App\User;
use DB;
use App\Submission;

class AchievementsController extends Controller
{

    public function create()
    {
        return view('achievements/create_achievement');
    }
    public function submission()
    {
        $achievements = Achievement::orderBy('created_at','desc')->get();
        return view('achievements/submit_try')->with('achievements',$achievements);
    }
    public function show_submission()
    {
        //$submissions = DB::table('submissions')->orderBy('created_at', 'desc')->first();
        //->join('achievements','achievements.id','=','submission.id')
        //$submissions = Achievement::orderBy('created_at','desc')->with('submissions')->first();
        $submission=Submission::with('achievement')
            ->orderBy('created_at', 'desc')
            ->where('status','pending')
            ->first();
        if(isset($submission))
            $submission->video_url = $this->YoutubeID($submission->video_link);

        return view('achievements/vote_submission')->with('submission',$submission);
    }
    public function vote(Request $request)
    {
        //return response()->json($request);

        //return  $request->json('no');
        $submission = Submission::find($request->json('id'));
        $submission->yes = $request->json('yes');
        $submission->no = $request->json('no');
        if($submission->yes == 2){
            $submission->status='passed';
        }
        if($submission->no == 2){
            $submission->status='failed';
        }
        $submission->save();
        //Submission::whereId($request->id)->update($request->all());
        //$sql = "UPDATE Submissions SET passed=$decision WHERE id=$sub_id";
        //$post->comments()->updateExistingPivot($comment->id, ['count' => 9]);


        //$user->achievements()->attach($achievement->id, ['yes' => 0, 'no' => 0,'passed' => 0, 'video_link' => $request->video_link]);
    }
    public function index()
    {
        $achievements = Achievement::orderBy('created_at','desc')->get();
        return view('achievements/achievements')->with('achievements',$achievements);
    }

    public function show($id)
    {
        $achievement = Achievement::find($id);
        return view('achievements/achievements')->with('achievement',$achievement);
    }

    public function store(Request $request)
    {
        //return response()->json($request);
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'icon' => 'image|nullable|max:1999'
        ]);
        // Handle photo upload
        if($request->hasFile('icon')){
            //Get filename with extension
            $fileNameWithExt = $request->file('icon')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('icon')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('icon')->storeAs('public/cover_images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Create Achievement
        $achievement = new Achievement;


        $achievement->name = $request->input('name');
        $achievement->description = $request->input('description');
        $achievement->icon = $fileNameToStore;
        $achievement->user_id = Auth::user()->id;
        //return response($achievement);
        $achievement->save();

        return redirect('home')->with('success','Achievement successfully created!');
    }

    public function submit(Request $request){

        $this->validate($request,[
            'video_link' => 'required',
            'achievement' => 'required'
        ]);
        $achievement = json_decode($request->achievement);

        //Create Submission
        $user = Auth::user();
        //$request->achievement = json_decode($request->achievement);
        //return response()->json($request);
        $user->achievements()->attach($achievement->id, ['yes' => 0, 'no' => 0,'status' => 'pending', 'video_link' => $request->video_link]);

    }
    function YoutubeID($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }
        return $url;
    }

}