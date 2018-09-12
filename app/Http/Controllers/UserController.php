<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\Achievement;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $user = User::with('achievements')->find($id);
        //$user = User::find($id)->achievements()->where('achievement.passed', true)->get();
//        $user = User::with(['achievements' => function ($query) {
//            $query->where('passed', true);
//        }])->get();
//        $user = User::whereHas('author', function ($q) use ($authorId) {
//            $q->where('id', $authorId);
//        })->get();


        return view('user/profile')->with('user',$user);
    }

    public function update(Request $request ,$id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|',
            'password' => 'required|min:6|',
            'profile_pic' => 'image|nullable|max:1999',
        ]);

        // Handle photo upload
        if($request->hasFile('profile_pic')){
            //Get filename with extension
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('profile_pic')->storeAs('public/cover_images', $fileNameToStore);

        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        if($request->hasFile('profile_pic')){
            $user->profile_pic = $fileNameToStore;
        }

        $user->save();

        return view('user/profile')->with('user',$user)->with('success','Exercise successfully created!');
    }
}