@extends('layouts.app')
@section('content')
    <h1 class="titleheader" style="background: lightblue;">Create post</h1>
    {!! Form::open(['action' => 'PostsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['class' => 'form-control','placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('video_link','Video link')}}
            {{Form::text('video_link','',['class' => 'form-control','placeholder' => 'ex:   youtube.com/J5a4aSffaw'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection


