@extends('layouts.app')
@section('content')
    {{--<h1 class="titleheader" style="background: lightcoral;">Create workout</h1>--}}
    <div class="routine-upper row" style="margin: 0px 0px 20px 0px;">
        <div class="left-section col-md-8" style="padding:0px;">
            @if($routine->poster != "noimage.jpg")
                <img src="/storage/cover_images/{{$routine->poster}}" class="routine-image">
            @else
                <img src="/storage/cover_images/exercisenoimage.jpg" class="routine-image">
            @endif

        </div>
        <div class="right-section col-md-4" style="padding:0px;background: #212432;color: white;">
            <div style="padding:50px;height:100%;display:grid;">
                <h3 style="margin-bottom:30px;">{{$routine->title}}</h3>
                <ul style="list-style-type: none;font-size:16px;padding:0px;margin-bottom:40px;">
                    <li>
                        <span style="color:#a7aabb;">Type:</span>
                        <span>{{$routine->type}}</span>
                    </li>
                    <li>
                        <span style="color:#a7aabb;">Duration:</span>
                        <span>{{$routine->duration}}</span>
                    </li>
                    <li>
                        <span style="color:#a7aabb;">Muscle group:</span>
                        <span>asdasdasd</span>
                    </li>
                    <li>
                        Created by <span>{{$routine->user->name}}</span>
                    </li>
                </ul>
                <div style="">
                    {{--<a class=" btn btn-danger" style="width:100%">add to fav wip</a>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="routine-middle" style="margin-bottom: 20px;">
        <div style="border-top:1px solid lightgray;padding:10px 0px 10px 0px;">
            <p>{{$routine->body}}</p>
        </div>
    </div>
    <div class="routine-lower" style="margin-bottom: 20px;border-top:1px solid lightgray;padding:10px 0px 10px 0px;">
        <h2>Weekly program</h2>
        <div class="calendar" width="" style="display:flex;border:1px solid lightgray;">
            <div id="1" class="day">
                <div class="card-container" style="margin-bottom:10px;">
                    <div class="">
                        <div class="front calendar-day">
                            <span style="font-weight:bold;color:white;">Monday</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-content">
                </div>
            </div>
            <div id="2" class="day">
                <div class="card-container" style="margin-bottom:10px;">
                    <div class="">
                        <div class="front calendar-day">
                            <span style="font-weight:bold;color:white;">Tuesday</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-content">
                </div>
            </div>
            <div id="3" class="day">
                <div class="card-container" style="margin-bottom:10px;">
                    <div class="">
                        <div class="front calendar-day">
                            <span style="font-weight:bold;color:white;">Wednesday</span>
                        </div>

                    </div>
                </div>
                <div class="calendar-content">
                </div>
            </div>
            <div id="4" class="day">
                <div class="card-container" style="margin-bottom:10px;">
                    <div class="">
                        <div class="front calendar-day">
                            <span style="font-weight:bold;color:white;">Thursday</span>
                        </div>

                    </div>
                </div>
                <div class="calendar-content">
                </div>
            </div>
            <div id="5" class="day">
                <div class="card-container" style="margin-bottom:10px;">
                    <div class="">
                        <div class="front calendar-day">
                            <span style="font-weight:bold;color:white;">Friday</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-content">
                </div>
            </div>
            <div id="6" class="day">
                <div class="card-container" style="margin-bottom:10px;">
                    <div class="">
                        <div class="front calendar-day">
                            <span style="font-weight:bold;color:white;">Saturday</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-content">
                </div>
            </div>
            <div id="7" class="day" style="border: none;">
                {{--////--}}
                <div class="card-container" style="margin-bottom:10px;">
                    <div class="">
                        <div class="front calendar-day">
                            <span style="font-weight:bold;color:white;">Sunday</span>
                        </div>
                    </div>
                </div>
                <div class="calendar-content">
                </div>
                {{--////--}}
            </div>
        </div>

    </div>
    @auth
        @if(Auth::user()->id == $routine->user_id)
            <div class="row" style="margin:20px 0px 0px 0px;">
                {!!Form::open(['action' => ['RoutinesController@destroy',$routine->id],'method'=>'POST','class'=>'pull-right']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                {!!Form::close() !!}
            </div>
        @endif
    @endauth




@endsection
@section('script_section')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="{{ URL::to('js/view_routine.js') }}"></script>
    <script>
        var routine = {!! $routine->toJson() !!};
    </script>
@stop


