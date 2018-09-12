@extends('layouts.app')
@section('content')
    <div class="blog-single blog-style-large">

        <article class="col-md-12">
            <div class="post-container">

                <div class="blog-post-title" style="margin-bottom: 20px;">
                    <h1 class="titleheader" style="background-color: lightseagreen;">{{$exercise->title}}</h1>
                </div>
                <div class="post-body-upper row">
                    <div class="left-section col-md-6">
                        @if($exercise->video_link != 'novideolink')
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{$exercise->video_url}}" allowfullscreen></iframe>
                            </div>
                        @endif
                    </div>
                    <div class="right-section col-md-6">
                        <ul style="list-style-type: none;font-size:18px;">
                            <li>
                                Type: {{$exercise->type}}
                            </li>
                            <li>
                                Muscle group: <span id="msclgrps">{{$exercise->muscle_group}}</span>
                            </li>
                            <li>
                                Posted by
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="post-body-lower">
                    @if($exercise->first_image != "noimage.jpg" || $exercise->second_image != "noimage.jpg")
                        <div class="post-content row">
                            @if($exercise->first_image != "noimage.jpg")
                                <img src="/storage/cover_images/{{$exercise->first_image}}" style="width:50%;padding:10px;">
                            @endif
                            @if($exercise->second_image != "noimage.jpg")
                                <img src="/storage/cover_images/{{$exercise->second_image}}" style="width:50%;padding:10px;">
                            @endif
                        </div>
                    @endif
                    <div class="post-instructions row">
                        <div class="muscle-chart col-md-6" style="padding:10px;">
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
                        <div class="col-md-6" style="padding:20px;border-left:1px dashed;border-color:lightgray;">
                            <h3>Instructions</h3>
                            <p>{{$exercise->body}}</p>
                        </div>
                    </div>
                    @auth
                        @if(Auth::user()->id == $exercise->user_id)
                            <div class="row" style="margin:20px 0px 0px 0px;">
                                <a style="margin-right: 10px;" href="/exercises/{{$exercise->id}}/edit" class="btn btn-info">Edit</a>

                                {!!Form::open(['action' => ['ExercisesController@destroy',$exercise->id],'method'=>'POST','class'=>'pull-right']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!!Form::close() !!}
                            </div>
                        @endif
                    @endauth

                </div>

            </div>
        </article>
    </div>

@endsection
@section('script_section')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="{{ URL::to('js/exercise_muscle_chart.js') }}"></script>
@stop