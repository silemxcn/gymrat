<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use DateTime;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$user_id = auth()->user()->id;
        //$user = User::find($user_id);

        $posts = Post::orderBy('created_at','desc')->with('user')->get();
        //date_default_timezone_set('Europe/Bucharest');
        foreach ($posts as $post){
            $formatted_date = new DateTime($post->created_at);
            $now = new DateTime(date('Y-m-d H:i:s'));
            $interval = $now->diff($formatted_date);
            $post->diff = $interval;

            if($interval->d == 0) {
                $post->today = true;
                for ($i = 0; $i <= 4; $i++) {
                    if ($interval->h > 0) {
                        $post->post_age = (string)$interval->h . " hours";
                        break;
                    }
                    if ($interval->i > 0) {
                        $post->post_age = (string)$interval->i . " minutes";
                        break;
                    }
                    if ($interval->s > 0) {
                        $post->post_age = (string)$interval->s . " seconds";
                        break;
                    }
                }
            }
            else{
                $post->hour_posted = date_format($formatted_date,"H:i A");
                $post->date_posted = date_format($formatted_date,"d.m.Y");
            }

        }



        //return view('home')->with('posts',$posts,$user->posts);
        return view('home')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'video_link' => 'nullable'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){
        //Get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
        //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
        //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }



        //Create Post
        $post = new Post;
        // Handle video link
        if(isset($request->video_link)){
            $post->video_link = $request->input('video_link');
        }
        else{
            $post->video_link = 'novideolink';
        }

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;

        $post->save();

        return redirect('posts')->with('success','Post Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $formatted_date = new DateTime($post->created_at);
        $post->date_posted = date_format($formatted_date,"d.m.Y");
        $post->video_url = $this->YoutubeID($post->video_link);

        return view('post/post')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post/edit_post')->with('post',$post);
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
            'cover_image' => 'image|nullable|max:1999',
            'video_link' => 'nullable'

        ]);
        // Handle file upload
        if($request->hasFile('cover_image')){
            //Get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }


        //Edit Post
        $post = Post::find($id);
        // Handle video link
        if(isset($request->video_link)){
            $post->video_link = $request->input('video_link');
        }
        else{
            $post->video_link = 'novideolink';
        }

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('posts')->with('success','Post Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page!');
        }
        if($post->cover_image != 'noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('posts')->with('success','Post Removed!');
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
