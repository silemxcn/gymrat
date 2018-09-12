@extends('layouts.app')
@section('content')
    <h1 class="titleheader" style="background: lightsalmon;">Choose the achievement you want to attempt</h1>
    {{--@php--}}
    {{--dd($achievements);--}}
    {{--@endphp--}}
    <div class='container' style="background: mediumorchid;padding:30px;">
        <div class='user-showcase'>
            @if(count($achievements) > 0)
                @foreach($achievements as $achievement)
                    <a class="glow-ach no-underline" href="#" onclick="selectAchievement({{$achievement}})">
                        <div>
                            <div style="text-align: -moz-center;padding:10px;">
                                <img style="width:150px;height:150px;border-radius: 50%;" src="/storage/cover_images/{{$achievement->icon}}">
                                <h3 style="text-align:center;color:black;">{{$achievement->name}}</h3>
                            </div>
                            <div>

                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
    {!! Form::open(['action' => 'AchievementsController@store','method' => 'POST', 'enctype' => 'multipart/form-data','id' => 'form']) !!}
        <div class="form-group">
            {{Form::label('video_link','Youtube link')}}
            {{Form::text('video_link','',['class' => 'form-control','placeholder' => 'ex.  youtube.com/R23d29hm6er9x'])}}
        </div>
    {{Form::submit('Submit',['class' => 'btn btn-primary', 'id' => 'ajaxSubmit'])}}
    {!! Form::close() !!}
@endsection
@section('script_section')
    <script src="{{ URL::to('js/submit_try.js') }}"></script>
@endsection