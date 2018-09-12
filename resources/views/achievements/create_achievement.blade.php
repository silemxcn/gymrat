@extends('layouts.app')
@section('content')
    <h1 class="titleheader" style="background: lightsalmon;">Create Achievement</h1>
    {!! Form::open(['action' => 'AchievementsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div style="display:flex;">
        <div class="form-group" style="width:50%;">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class' => 'form-control','placeholder' => 'insert a name'])}}
        </div>
        <div class="form-group" style="flex:1 1;text-align:center;">
            <p>Icon (will appear on thumbnail)</p>
            {{Form::file('icon',['id' => 'fileInput'])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::label('description','Instructions')}}
        {{Form::textarea('description','',['class' => 'form-control','placeholder' => 'insert description/how to obtain'])}}
    </div>

    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection


