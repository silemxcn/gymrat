@extends('layouts.app')

@section('content')

    <div class="container bootstrap snippet">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        {{--@php--}}
        {{--dd($user->achievements);--}}
        {{--@endphp--}}
        <div class="row">
            <div class="col-sm-3" style="height:220px;">
                <a href="/users" class="pull-right">
                    <img title="profile image" style="width:100%;height:100%;object-fit:cover;" class="img-circle" src="/storage/cover_images/{{$user->profile_pic}}">
                </a>
            </div>
            <div class="col-sm-9">
                <div class='container' style="background: mediumorchid;padding:30px;">
                    <div class='user-showcase'>
                        @if(count($user->achievements) > 0)
                            @foreach($user->achievements as $achievement)
                                <div>
                                    <div style="text-align: -moz-center;padding:10px;">
                                        <img style="width:100px;height:100px;border-radius: 50%;" src="/storage/cover_images/{{$achievement->icon}}">
                                        <h3 style="text-align:center;color:black;">{{$achievement->name}}</h3>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->

                <ul class="list-group">
                    <li class="list-group-item text-muted" style="font-weight:bold;">Profile</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong style="float:left;">Name</strong></span> {{$user->name}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong style="float:left;">Email</strong></span> {{$user->email}}</li>

                </ul>
                <br>
                <ul class="list-group">
                    <li class="list-group-item text-muted" style="font-weight:bold;">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong style="float:left;">Achievements</strong></span> {{$user->achievements->count()}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong style="float:left;">Workouts</strong></span> {{$user->routines->count()}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong style="float:left;">Exercises</strong></span> {{$user->exercises->count()}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong style="float:left;">Posts</strong></span> {{$user->posts->count()}}</li>
                </ul>


            </div>
            <!--/col-3-->
            <div class="col-sm-9">

                <ul class="nav nav-tabs" id="myTab">
                    <li><a class="active show" href="#workouts" data-toggle="tab">My Workouts</a></li>
                    <li><a href="#exercises" data-toggle="tab">My Exercises</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="workouts">
                        <br>
                        @if(count($user->routines) > 0)
                            @foreach($user->routines as $routines)
                                <div class="card" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-md-3" style="padding-right:0px;">
                                            <a href="/routines/{{$routines->id}}">
                                                @if($routines->poster != "exercisenoimage.jpg")
                                                    <div class="row" style="margin:0px;height:100%;">
                                                        <div class="col-sm-12" style="padding:0px;max-height:200px;">
                                                            <img  style="width:100%;height:100%;object-fit:cover;" src="/storage/cover_images/{{$routines->poster}}">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div>
                                                        <img  style="width:100%;height:100%;object-fit:contain;" src="/storage/cover_images/noimage.jpg">
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-9" style="padding-left:0px;">
                                            <div class="card-header exercise-header" style="background-color: rgb(33, 36, 50);">
                                                <a style="color:white;font-size:18px;" href="/routines/{{$routines->id}}">{{$routines->title}}</a>
                                            </div>

                                            <div class="card-body" style="padding-bottom:0px;">
                                                <p>Type: <span style="color:lightseagreen;text-transform: capitalize;">{{$routines->type}}</span></p>
                                                <p>Duration: <span style="color:lightseagreen;text-transform: capitalize;">{{$routines->duration}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No workouts found</p>
                        @endif
                    </div>
                    <!--/tab-pane-->
                    <div class="tab-pane" id="exercises">
                        <br>
                        @if(count($user->exercises) > 0)
                            @foreach($user->exercises as $exercise)
                                <div class="card" style="margin-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right:0px;">
                                            <a href="/exercises/{{$exercise->id}}">
                                                @if($exercise->first_image != "noimage.jpg" && $exercise->second_image != "noimage.jpg")
                                                    <div class="row" style="margin:0px;height:100%;">
                                                        <div class="col-sm-6" style="padding:10px 5px 10px 10px;max-height:200px;">
                                                            <img  style="width:100%;height:100%;object-fit:contain;" src="/storage/cover_images/{{$exercise->first_image}}">
                                                        </div>
                                                        <div class="col-sm-6" style="padding:10px 10px 10px 5px;max-height:200px;">
                                                            <img  style="width:100%;height:100%;object-fit:contain;" src="/storage/cover_images/{{$exercise->second_image}}">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div>
                                                        <img  style="width:100%;height:100%;object-fit:contain;" src="/storage/cover_images/noimage.jpg">
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6" style="padding-left:0px;">
                                            <div class="card-header exercise-header">
                                                <a style="color: white;font-size:18px;" href="/exercises/{{$exercise->id}}">{{$exercise->title}}</a>
                                            </div>

                                            <div class="card-body" style="padding-bottom:0px;">
                                                <p>Type: <span style="color:lightseagreen;text-transform: capitalize;">{{$exercise->type}}</span></p>
                                                <p>Muscle group: <span style="color:lightseagreen;text-transform: capitalize;">{{$exercise->muscle_group}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No exercises found</p>
                        @endif
                    </div>
                    <!--/tab-pane-->
                    <div class="tab-pane" id="settings">
                    <br>
                        {!! Form::open(['action' => ['UserController@update',$user->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                {{Form::label('name','Full name')}}
                                {{Form::text('name',$user->name,['class' => 'form-control','placeholder' => $user->name])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email',$user->email,['class' => 'form-control','placeholder' => $user->email])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('password','Password')}}
                                {{Form::text('password','',['class' => 'form-control','placeholder' => 'Required for validation'])}}
                            </div>
                            <div class="form-group">
                                <p>Profile picture</p>
                                {{Form::file('profile_pic')}}
                            </div>
                            <hr>
                        {{--/////////////////////////////////--}}
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Save changes',['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>

                </div>
                <!--/tab-pane-->
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
    <!--/row-->
@endsection

@section('script_section')
    <script src="{{ URL::to('js/user_profile.js') }}"></script>
@endsection