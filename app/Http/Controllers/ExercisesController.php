<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exercise;



class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::orderBy('created_at','desc')->get();
        return view('training/exercises')->with('exercises',$exercises);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('training/create_exercise');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return response()->json($request);
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'type' => 'required',
            'muscle_group' => 'required',
            'first_image' => 'image|nullable|max:1999',
            'second_image' => 'image|nullable|max:1999',
            'video_link' => 'nullable'
        ]);
        // Handle first photo upload
        if($request->hasFile('first_image')){
            //Get filename with extension
            $fileNameWithExt = $request->file('first_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('first_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('first_image')->storeAs('public/cover_images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        // Handle second photo upload
        if($request->hasFile('second_image')){
            //Get filename with extension
            $fileNameWithExt = $request->file('second_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('second_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('second_image')->storeAs('public/cover_images', $fileNameToStore2);

        }
        else{
            $fileNameToStore2 = 'noimage.jpg';
        }



        //Create Exercise
        $exercise = new Exercise;
        if(isset($request->video_link)){
            $exercise->video_link = $request->input('video_link');
        }
        else{
            $exercise->video_link = 'novideolink';
        }

        $exercise->title = $request->input('title');
        $exercise->body = $request->input('body');
        $exercise->type = $request->input('type');
        $exercise->muscle_group = $request->input('muscle_group');
        $exercise->first_image = $fileNameToStore;
        $exercise->second_image = $fileNameToStore2;
        $exercise->user_id = auth()->user()->id;
        $exercise->save();
        //$exercise->tag_array = explode(' ',$exercise->muscle_group);
        $exercise->tag(explode(' ',$exercise->muscle_group));
        $exercise->save();

        return redirect('exercises')->with('success','Exercise successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exercise = Exercise::find($id);
        $exercise->video_url = $this->YoutubeID($exercise->video_link);
        return view('training/exercise')->with('exercise',$exercise);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercise = Exercise::find($id);
        return view('training/edit_exercise')->with('exercise',$exercise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'type' => 'required',
            'muscle_group' => 'required',
            'first_image' => 'image|nullable|max:1999',
            'second_image' => 'image|nullable|max:1999',
            'video_link' => 'nullable'
        ]);
        // Handle first photo upload
        if($request->hasFile('first_image')){
            //Get filename with extension
            $fileNameWithExt = $request->file('first_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('first_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('first_image')->storeAs('public/cover_images', $fileNameToStore);

        }

        // Handle second photo upload
        if($request->hasFile('second_image')){
            //Get filename with extension
            $fileNameWithExt = $request->file('second_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('second_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('second_image')->storeAs('public/cover_images', $fileNameToStore2);

        }

        //Edit Post
        $exercise = Exercise::find($id);
        //Handle video link
        if(isset($request->video_link)){
            $exercise->video_link = $request->input('video_link');
        }
        else{
            $exercise->video_link = 'novideolink';
        }
        $exercise->title = $request->input('title');
        $exercise->body = $request->input('body');
        $exercise->type = $request->input('type');

        if($request->hasFile('first_image')){
            $exercise->first_image = $fileNameToStore;
        }
        if($request->hasFile('second_image')){
            $exercise->second_image = $fileNameToStore2;
        }
        $exercise->save();

        $exercise->tag(explode(' ',$exercise->muscle_group));
        $exercise->save();

        return redirect('exercises')->with('success','Exercise successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercise = Exercise::find($id);
        $exercise->delete();
        return redirect('exercises')->with('success','Exercise Removed!');
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
    public function add_exercise_modal(){
        $this->param['content']="Model 1 body.";
        return view('training.routine_add_exercise_modal',$this->param);
    }
}
