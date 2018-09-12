@extends('layouts.app')
@section('content')
    <h1 class="titleheader" style="background: lightseagreen;">Edit exercise</h1>
    {!! Form::open(['action' => ['ExercisesController@update',$exercise->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$exercise->title,['class' => 'form-control','placeholder' => 'Title'])}}
        </div>
        <div style="display: flex">
            <div style="width:50%;margin-right: 10px;"> {{-- left div --}}
                <div class="form-group">
                    {{Form::label('type','Type')}}
                    {{Form::select('type',array('cardio' => 'Cardio', 'strength' => 'Strength', 'powerlifting' => 'Powerlifting', 'stretching' => 'Stretching'),null, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('video_link','Video link')}}
                    {{Form::text('video_link',$exercise->video_link,['class' => 'form-control','placeholder' => 'ex: youtube.com/J5a4aSffaw'])}}
                </div>
                <p>First and second image</p>
                <div class="row" style="margin:0px;width:100%;overflow: hidden;">
                    <div class="form-group" style="width:50%;">
                        {{Form::file('first_image')}}
                    </div>
                    <div class="form-group" style="width:50%;overflow: hidden;">
                        {{Form::file('second_image')}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('body','Instructions')}}
                    {{Form::textarea('body',$exercise->body,['class' => 'form-control','style' => 'height:100%','placeholder' => 'Exercise description'])}}
                </div>
            </div>

            <div style="width:50%;">  {{-- right div --}}
                <div class="form-group">
                    {{Form::label('muscle_group','Muscle group ( Chart )')}}
                    {{Form::text('muscle_group',$exercise->muscle_group, ['class' => 'form-control','readonly'=>'readonly'])}}
                </div>
                {{--'traps' => 'Traps', 'shoulders' => 'Shoulders', 'pecs' => 'Pecs', 'biceps' => 'Biceps', 'forearm' => 'Forearm', 'obliques' => 'Obliques', 'quads' => 'Quads', 'calves' => 'Calves'--}}
                {{--/////////////////////////////////--}}
                <div id="wiki-body" class="container">
                    <div class="body">
                        <div class="row" id="sexchooserrow" style="margin-bottom: 50px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-center-text">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn active" id="sexchoosermalelabel" class="" onclick="showmale();">
                                        <input name="sexchooser" id="sexchoosermale" value="male" checked="" type="radio"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Male</span>
                                    </label>
                                    <label class="btn" id="sexchooserfemalelabel" class="" onclick="showfemale();">
                                        <input name="sexchooser" id="sexchooserfemale" value="female" type="radio"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Female</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div id="malefigures" style="display: block;">
                            <div id="muscle-map"><img id="background" src="{{ asset('/images/body/00.png') }}">
                                <img id="traps-a" class="traps" class="" onclick="selectList(this);" src="{{ asset('/images/body/08-TrapsLeft.png') }}">
                                <img id="traps-b" class="traps" onclick="selectList(this);" src="{{ asset('/images/body/08-TrapsRight.png') }}">
                                <img id="shoulders-a" class="shoulders" onclick="selectList(this);" src="{{ asset('/images/body/07A-Deltoids.png') }}">
                                <img id="shoulders-b" class="shoulders" onclick="selectList(this);" src="{{ asset('/images/body/07B-Deltoids.png') }}">
                                <img id="pecs" class="pecs" onclick="selectList(this);" src="{{ asset('/images/body/06-Pecs.png') }}">
                                <img id="biceps-a" class="biceps" onclick="selectList(this);" src="{{ asset('/images/body/05A-Biceps.png') }}">
                                <img id="biceps-b" class="biceps" onclick="selectList(this);" src="{{ asset('/images/body/05B-Biceps.png') }}">
                                <img id="forearm-a" class="forearm" onclick="selectList(this);" src="{{ asset('/images/body/14A-Forearms.png') }}">
                                <img id="forearm-b" class="forearm" onclick="selectList(this);" src="{{ asset('/images/body/14B-Forearms.png') }}">
                                <img id="obliques" class="abdominals" onclick="selectList(this);" src="{{ asset('/images/body/04-Obliques.png') }}">
                                <img id="quads-a" class="quads" onclick="selectList(this);" src="{{ asset('/images/body/01A-Quads.png') }}">
                                <img id="quads-b" class="quads" onclick="selectList(this);" src="{{ asset('/images/body/01B-Quads.png') }}">
                                <img id="calves-a" class="calves" onclick="selectList(this);" src="{{ asset('/images/body/13A-Calves.png') }}">
                                <img id="calves-b" class="calves" onclick="selectList(this);" src="{{ asset('/images/body/13B-Calves.png') }}">
                                <img id="back-traps-a" class="traps" onclick="selectList(this);" src="{{ asset('/images/body/08B-Traps.png') }}">
                                <img id="back-traps-b" class="upper-back" onclick="selectList(this);" src="{{ asset('/images/body/08C-Traps.png') }}">
                                <img id="back-shoulders-a" class="shoulders" onclick="selectList(this);" src="{{ asset('/images/body/07C-Deltoids.png') }}">
                                <img id="back-shoulders-b" class="shoulders" onclick="selectList(this);" src="{{ asset('/images/body/07D-Deltoids.png') }}">
                                <img id="triceps-a" class="triceps" onclick="selectList(this);" src="{{ asset('/images/body/09A-Triceps.png') }}">
                                <img id="triceps-b" class="triceps" onclick="selectList(this);" src="{{ asset('/images/body/09B-Triceps.png') }}">
                                <img id="back-lats-a" class="lats" onclick="selectList(this);" src="{{ asset('/images/body/10A-Lats.png') }}">
                                <img id="back-lats-b" class="lats" onclick="selectList(this);" src="{{ asset('/images/body/10B-Lats.png') }}">
                                <img id="back-lower" class="lower-back" onclick="selectList(this);" src="{{ asset('/images/body/15-Lower-Back.png') }}">
                                <img id="back-forearms-a" class="forearm" onclick="selectList(this);" src="{{ asset('/images/body/14C-Forearms.png') }}">
                                <img id="back-forearms-b" class="forearm" onclick="selectList(this);" src="{{ asset('/images/body/14D-Forearms.png') }}">
                                <img id="back-glutes" class="glutes" onclick="selectList(this);" src="{{ asset('/images/body/11-Glutes.png') }}">
                                <img id="back-hamstrings-a" class="hamstrings" onclick="selectList(this);" src="{{ asset('/images/body/12A-Hamstrings.png') }}">
                                <img id="back-hamstrings-b" class="hamstrings" onclick="selectList(this);" src="{{ asset('/images/body/12B-Hamstrings.png') }}">
                                <img id="back-calves-a" class="calves" onclick="selectList(this);" src="{{ asset('/images/body/13C-Calves.png') }}">
                                <img id="back-calves-b" class="calves" onclick="selectList(this);" src="{{ asset('/images/body/13D-Calves.png') }}"></div>
                        </div>
                        <div id="femalefigures" style="display: none;">
                            <div id="muscle-map-female">
                                <img id="background-female" class="" onclick="selectList(this);" src="{{ asset('/images/body/Female-Figures.png') }}">
                                <img id="female-traps-a" class="traps" onclick="selectList(this);" src="{{ asset('/images/body/female-traps-A.png') }}">
                                <img id="female-traps-b" class="traps" onclick="selectList(this);" src="{{ asset('/images/body/female-traps-B.png') }}">
                                <img id="female-shoulders-a" class="shoulders" onclick="selectList(this);" src="{{ asset('/images/body/female-deltoids-A.png') }}">
                                <img id="female-shoulders-b" class="shoulders" onclick="selectList(this);" src="{{ asset('/images/body/female-deltoids-B.png') }}">
                                <img id="female-pecs" class="pecs" onclick="selectList(this);" src="{{ asset('/images/body/female-pecs.png') }}">
                                <img id="female-biceps-a" class="biceps" onclick="selectList(this);" src="{{ asset('/images/body/female-biceps-A.png') }}">
                                <img id="female-biceps-b" class="biceps" onclick="selectList(this);" src="{{ asset('/images/body/female-biceps-B.png') }}">
                                <img id="female-forearm-a" class="forearm" onclick="selectList(this);" src="{{ asset('/images/body/female-forearms-A.png') }}">
                                <img id="female-forearm-b" class="forearm" onclick="selectList(this);" src="{{ asset('/images/body/female-forearms-B.png') }}">
                                <img id="female-abdominals" class="abdominals" onclick="selectList(this);" src="{{ asset('/images/body/female-abdominals.png') }}">
                                <img id="female-quads-a" class="quads" onclick="selectList(this);" src="{{ asset('/images/body/female-quads-A.png') }}">
                                <img id="female-quads-b" class="quads" onclick="selectList(this);" src="{{ asset('/images/body/female-quads-B.png') }}">
                                <img id="female-calves-a" class="calves" onclick="selectList(this);" src="{{ asset('/images/body/female-calves-A.png') }}">
                                <img id="female-calves-b" class="calves" onclick="selectList(this);" src="{{ asset('/images/body/female-calves-B.png') }}">
                                <img id="female-back-traps-a" class="traps" onclick="selectList(this);" src="{{ asset('/images/body/female-traps-C.png') }}">
                                <img id="female-back-traps-b" class="traps" onclick="selectList(this);" src="{{ asset('/images/body/female-traps-D.png') }}">
                                <img id="female-back-shoulders-a" class="shoulders" onclick="selectList(this);" src="{{ asset('/images/body/female-deltoids-C.png') }}">
                                <img id="female-back-shoulders-b" class="shoulders" onclick="selectList(this);" src="{{ asset('/images/body/female-deltoids-D.png') }}">
                                <img id="female-triceps-a" class="triceps" onclick="selectList(this);" src="{{ asset('/images/body/female-triceps-A.png') }}">
                                <img id="female-triceps-b" class="triceps" onclick="selectList(this);" src="{{ asset('/images/body/female-triceps-B.png') }}">
                                <img id="female-back-lats-a" class="lats" onclick="selectList(this);" src="{{ asset('/images/body/female-lats-A.png') }}">
                                <img id="female-back-lats-b" class="lats" onclick="selectList(this);" src="{{ asset('/images/body/female-lats-B.png') }}">
                                <img id="female-back-lower" class="lower-back" onclick="selectList(this);" src="{{ asset('/images/body/female-lowerback.png') }}">
                                <img id="female-back-forearms-a" class="forearm" onclick="selectList(this);" src="{{ asset('/images/body/female-forearms-C.png') }}">
                                <img id="female-back-forearms-b" class="forearm" onclick="selectList(this);" src="{{ asset('/images/body/female-forearms-D.png') }}">
                                <img id="female-back-glutes" class="glutes" onclick="selectList(this);" src="{{ asset('/images/body/female-glutes.png') }}">
                                <img id="female-back-hamstrings-a" class="hamstrings" onclick="selectList(this);" src="{{ asset('/images/body/female-hamstrings-A.png') }}">
                                <img id="female-back-hamstrings-b" class="hamstrings" onclick="selectList(this);" src="{{ asset('/images/body/female-hamstrings-B.png') }}">
                                <img id="female-back-calves-a" class="calves" onclick="selectList(this);" src="{{ asset('/images/body/female-calves-C.png') }}">
                                <img id="female-back-calves-b" class="calves" onclick="selectList(this);" src="{{ asset('/images/body/female-calves-D.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--/////////////////////////////////--}}
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
@section('script_section')
    <script src="{{ URL::to('js/create_exercise_muscle_chart.js') }}"></script>
@stop

