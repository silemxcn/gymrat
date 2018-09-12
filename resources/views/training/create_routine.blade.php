@extends('layouts.app')
@section('content')
    <h1 class="titleheader" style="background: lightcoral;">Create workout</h1>
    {!! Form::open(['action' => 'RoutinesController@store','method' => 'POST', 'enctype' => 'multipart/form-data','id' => 'workoutform']) !!}
    <div>
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => 'title placeholder'])}}
        </div>
        <div style="display:flex;">
            <div class="form-group" style="margin-right:20px;flex:1 1;">
                {{Form::label('type','Type')}}
                {{Form::select('type',array('cardio' => 'Cardio', 'strength' => 'Strength', 'powerlifting' => 'Powerlifting', 'stretching' => 'Stretching'),null, ['class' => 'form-control'])}}
            </div>
            <div class="form-group" style="margin-right:20px;flex:1 1;">
                {{Form::label('duration','Duration')}}
                {{Form::text('duration','',['class' => 'form-control','placeholder' => 'ex: 4 weeks'])}}
            </div>
            <div class="form-group" style="flex:1 1;text-align:center;">
                <p>Cover image (will also appear on thumbnail)</p>
                {{Form::file('poster',['id' => 'fileInput'])}}
            </div>
        </div>
        <div class="form-group" style="display:grid;min-height:200px;border-bottom:1px solid lightgray;padding-bottom: 20px;margin-bottom: 20px;">
            {{Form::label('body','Description')}}
            {{Form::textarea('body','',['class' => 'form-control','placeholder' => 'Body Text'])}}
        </div>
        <div style="margin-bottom: 20px;">
            <h2>Weekly program</h2>
            <div class="calendar" width="" style="display:flex;border:1px solid lightgray;">
                <div id="1" class="day">
                    <div class="card-container" style="margin-bottom:10px;">
                        <div class="card-flip">
                            <div class="front calendar-day">
                                <span style="font-weight:bold;color:white;">Monday</span>
                            </div>
                            <div class="back calendar-day" style="background-color: white;">
                                <a href="#" onclick="select(1);" style="font-weight:bold;color:lightcoral;" data-toggle="modal" data-target="#addexmodal">Add exercise</a>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content">
                    </div>
                    <div class="calendar-footer">
                        <i class="far fa-trash-alt shake" onclick="clearday(1)" style="width:100%;"></i>
                    </div>
                </div>
                <div id="2" class="day">
                    <div class="card-container" style="margin-bottom:10px;">
                        <div class="card-flip">
                            <div class="front calendar-day">
                                <span style="font-weight:bold;color:white;">Tuesday</span>
                            </div>
                            <div class="back calendar-day" style="background-color: white;">
                                <a href="#" onclick="select(2);" style="font-weight:bold;color:lightcoral;" data-toggle="modal" data-target="#addexmodal">Add exercise</a>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content">
                    </div>
                    <div class="calendar-footer">
                        <i class="far fa-trash-alt shake" onclick="clearday(2)" style="width:100%;"></i>
                    </div>
                </div>
                <div id="3" class="day">
                    <div class="card-container" style="margin-bottom:10px;">
                        <div class="card-flip">
                            <div class="front calendar-day">
                                <span style="font-weight:bold;color:white;">Wednesday</span>
                            </div>
                            <div class="back calendar-day" style="background-color: white;">
                                <a href="#" onclick="select(3);" style="font-weight:bold;color:lightcoral;" data-toggle="modal" data-target="#addexmodal">Add exercise</a>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content">
                    </div>
                    <div class="calendar-footer">
                        <i class="far fa-trash-alt shake" onclick="clearday(3)" style="width:100%;"></i>
                    </div>
                </div>
                <div id="4" class="day">
                    <div class="card-container" style="margin-bottom:10px;">
                        <div class="card-flip">
                            <div class="front calendar-day">
                                <span style="font-weight:bold;color:white;">Thursday</span>
                            </div>
                            <div class="back calendar-day" style="background-color: white;">
                                <a href="#" onclick="select(4);" style="font-weight:bold;color:lightcoral;" data-toggle="modal" data-target="#addexmodal">Add exercise</a>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content">
                    </div>
                    <div class="calendar-footer">
                        <i class="far fa-trash-alt shake" onclick="clearday(4)" style="width:100%;"></i>
                    </div>
                </div>
                <div id="5" class="day">
                    <div class="card-container" style="margin-bottom:10px;">
                        <div class="card-flip">
                            <div class="front calendar-day">
                                <span style="font-weight:bold;color:white;">Friday</span>
                            </div>
                            <div class="back calendar-day" style="background-color: white;">
                                <a href="#" onclick="select(5);" style="font-weight:bold;color:lightcoral;" data-toggle="modal" data-target="#addexmodal">Add exercise</a>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content">
                    </div>
                    <div class="calendar-footer">
                        <i class="far fa-trash-alt shake" onclick="clearday(5)" style="width:100%;"></i>
                    </div>
                </div>
                <div id="6" class="day">
                    <div class="card-container" style="margin-bottom:10px;">
                        <div class="card-flip">
                            <div class="front calendar-day">
                                <span style="font-weight:bold;color:white;">Saturday</span>
                            </div>
                            <div class="back calendar-day" style="background-color: white;">
                                <a href="#" onclick="select(6);" style="font-weight:bold;color:lightcoral;" data-toggle="modal" data-target="#addexmodal">Add exercise</a>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content">
                    </div>
                    <div class="calendar-footer">
                        <i class="far fa-trash-alt shake" onclick="clearday(6)" style="width:100%;"></i>
                    </div>
                </div>
                <div id="7" class="day" style="border: none;">
                    {{--////--}}
                    <div class="card-container" style="margin-bottom:10px;">
                        <div class="card-flip">
                            <div class="front calendar-day">
                                <span style="font-weight:bold;color:white;">Sunday</span>
                            </div>
                            <div class="back calendar-day" style="background-color: white;">
                                <a href="#" onclick="select(7);" style="font-weight:bold;color:lightcoral;" data-toggle="modal" data-id="7" data-target="#ModalExample">Add exercise</a>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-content">
                    </div>
                    <div class="calendar-footer">
                        <i class="far fa-trash-alt shake" onclick="clearday(7)" style="width:100%;"></i>
                    </div>
                    {{--////--}}
                </div>
            </div>

        </div>
    </div>

    {{Form::submit('Submit',['class' => 'btn btn-primary', 'id' => 'ajaxSubmit'])}}
    {!! Form::close() !!}
    {{--Work in progress--}}

    <div class="modal fade" id="addexmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Choose from list</h4>
                </div>
                <div class="modal-body" style="padding-bottom:0px;max-height: calc(100vh - 200px);overflow-y: auto;">
                    @if(count($exercises) > 0)
                        @foreach($exercises as $exercise)
                            <div class="card glow-card" style="margin-bottom: 20px;">
                                <div class="row">
                                    <div class="col-md-6" style="padding-right:0px;">
                                        <a onclick="addex({{$exercise}});">
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
                                                <div style="margin:0px;height:100%;">
                                                    <img  style="width:100%;height:100%;object-fit:contain;" src="/storage/cover_images/noimage.jpg">
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-6" style="padding-left:0px;">
                                        <div class="card-header exercise-header">
                                            <a style="color: white;font-size:18px;" onclick="addex({{$exercise}});">{{$exercise->title}}</a>
                                        </div>

                                        <div class="card-body" style="padding-bottom:0px;">
                                            <p>Type: <span style="color:lightseagreen">{{$exercise->type}}</span></p>
                                            <p>Muscle group: <span style="color:lightseagreen">{{$exercise->muscle_group}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No exercises found</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script_section')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="{{ URL::to('js/create_routine.js') }}"></script>
@stop


