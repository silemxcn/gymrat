@extends('layouts.app')
@section('content')
    <h1 class="titleheader" style="background: lightsalmon;">Edit post</h1>
    {!! Form::open(['action' => ['PostsController@update',$post->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body',$post->body,['class' => 'form-control','placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('video_link','Video link')}}
            {{Form::text('video_link',$post->video_link,['class' => 'form-control','placeholder' => 'ex:   youtube.com/J5a4aSffaw'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection


