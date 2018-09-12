@extends('layouts.app')
@section('content')
    <div id="wiki-body" class="container">
        <div class="body">
            <p></p>
            <div class="row" id="sexchooserrow">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-center-text">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn active" id="sexchoosermalelabel">
                            <input name="sexchooser" id="sexchoosermale" value="male" checked="" type="radio"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Male</span>
                        </label>
                        <label class="btn" id="sexchooserfemalelabel">
                            <input name="sexchooser" id="sexchooserfemale" value="female" type="radio"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Female</span>
                        </label>
                    </div>
                </div>
                <div id="select_options">
                    <select id="my_selection">
                        <option value="options" href="/">Exercises</option>
                        <option value="stretches" href="/Stretches">Stretches</option>
                        <option value="stretches" href="/Bodyweight">Bodyweight</option>
                    </select>
                </div>

            </div>
            <div id="malefigures" style="display: block;">
                <div id="mobile-muscle-map"><img id="mobilebg" src="{{ asset('/images/body/mobilebg.png') }}">
                    <img id="traps-a" src="{{ asset('/images/body/08-TrapsLeft.png') }}">
                    <img id="traps-b" src="{{ asset('/images/body/08-TrapsRight.png') }}">
                    <img id="shoulders-a" src="{{ asset('/images/body/07A-Deltoids.png') }}">
                    <img id="shoulders-b" src="{{ asset('/images/body/07B-Deltoids.png') }}">
                    <img id="pecs" src="{{ asset('/images/body/06-Pecs.png') }}">
                    <img id="biceps-a" src="{{ asset('/images/body/05A-Biceps.png') }}">
                    <img id="biceps-b" src="{{ asset('/images/body/05B-Biceps.png') }}">
                    <img id="forearm-a" src="{{ asset('/images/body/14A-Forearms.png') }}">
                    <img id="forearm-b" src="{{ asset('/images/body/14B-Forearms.png') }}">
                    <img id="obliques" src="{{ asset('/images/body/04-Obliques.png') }}">
                    <img id="quads-a" src="{{ asset('/images/body/01A-Quads.png') }}">
                    <img id="quads-b" src="{{ asset('/images/body/01B-Quads.png') }}">
                    <img id="calves-a" src="{{ asset('/images/body/13A-Calves.png') }}">
                    <img id="calves-b" src="{{ asset('/images/body/13B-Calves.png') }}">
                    <img id="back-traps-a" src="{{ asset('/images/body/08B-Traps.png') }}">
                    <img id="back-traps-b" src="{{ asset('/images/body/08C-Traps.png') }}">
                    <img id="back-shoulders-a" src="{{ asset('/images/body/07C-Deltoids.png') }}">
                    <img id="back-shoulders-b" src="{{ asset('/images/body/07D-Deltoids.png') }}">
                    <img id="triceps-a" src="{{ asset('/images/body/09A-Triceps.png') }}">
                    <img id="triceps-b" src="{{ asset('/images/body/09B-Triceps.png') }}">
                    <img id="back-lats-a" src="{{ asset('/images/body/10A-Lats.png') }}">
                    <img id="back-lats-b" src="{{ asset('/images/body/10B-Lats.png') }}">
                    <img id="back-lower" src="{{ asset('/images/body/15-Lower-Back.png') }}">
                    <img id="back-forearms-a" src="{{ asset('/images/body/14C-Forearms.png') }}">
                    <img id="back-forearms-b" src="{{ asset('/images/body/14D-Forearms.png') }}">
                    <img id="back-glutes" src="{{ asset('/images/body/11-Glutes.png') }}">
                    <img id="back-hamstrings-a" src="{{ asset('/images/body/12A-Hamstrings.png') }}">
                    <img id="back-hamstrings-b" src="{{ asset('/images/body/12B-Hamstrings.png') }}">
                    <img id="back-calves-a" src="{{ asset('/images/body/13C-Calves.png') }}">
                    <img id="back-calves-b" src="{{ asset('/images/body/13D-Calves.png') }}"></div>

                <div id="muscle-map"><img id="background" src="{{ asset('/images/body/00.png') }}">
                    <img id="traps-a" src="{{ asset('/images/body/08-TrapsLeft.png') }}">
                    <img id="traps-b" src="{{ asset('/images/body/08-TrapsRight.png') }}">
                    <img id="shoulders-a" src="{{ asset('/images/body/07A-Deltoids.png') }}">
                    <img id="shoulders-b" src="{{ asset('/images/body/07B-Deltoids.png') }}">
                    <img id="pecs" src="{{ asset('/images/body/06-Pecs.png') }}">
                    <img id="biceps-a" src="{{ asset('/images/body/05A-Biceps.png') }}">
                    <img id="biceps-b" src="{{ asset('/images/body/05B-Biceps.png') }}">
                    <img id="forearm-a" src="{{ asset('/images/body/14A-Forearms.png') }}">
                    <img id="forearm-b" src="{{ asset('/images/body/14B-Forearms.png') }}">
                    <img id="obliques" src="{{ asset('/images/body/04-Obliques.png') }}">
                    <img id="quads-a" src="{{ asset('/images/body/01A-Quads.png') }}">
                    <img id="quads-b" src="{{ asset('/images/body/01B-Quads.png') }}">
                    <img id="calves-a" src="{{ asset('/images/body/13A-Calves.png') }}">
                    <img id="calves-b" src="{{ asset('/images/body/13B-Calves.png') }}">
                    <img id="back-traps-a" src="{{ asset('/images/body/08B-Traps.png') }}">
                    <img id="back-traps-b" src="{{ asset('/images/body/08C-Traps.png') }}">
                    <img id="back-shoulders-a" src="{{ asset('/images/body/07C-Deltoids.png') }}">
                    <img id="back-shoulders-b" src="{{ asset('/images/body/07D-Deltoids.png') }}">
                    <img id="triceps-a" src="{{ asset('/images/body/09A-Triceps.png') }}">
                    <img id="triceps-b" src="{{ asset('/images/body/09B-Triceps.png') }}">
                    <img id="back-lats-a" src="{{ asset('/images/body/10A-Lats.png') }}">
                    <img id="back-lats-b" src="{{ asset('/images/body/10B-Lats.png') }}">
                    <img id="back-lower" src="{{ asset('/images/body/15-Lower-Back.png') }}">
                    <img id="back-forearms-a" src="{{ asset('/images/body/14C-Forearms.png') }}">
                    <img id="back-forearms-b" src="{{ asset('/images/body/14D-Forearms.png') }}">
                    <img id="back-glutes" src="{{ asset('/images/body/11-Glutes.png') }}">
                    <img id="back-hamstrings-a" src="{{ asset('/images/body/12A-Hamstrings.png') }}">
                    <img id="back-hamstrings-b" src="{{ asset('/images/body/12B-Hamstrings.png') }}">
                    <img id="back-calves-a" src="{{ asset('/images/body/13C-Calves.png') }}">
                    <img id="back-calves-b" src="{{ asset('/images/body/13D-Calves.png') }}"></div>
            </div>
            <div id="femalefigures" style="display: none;">
                <div id="mobile-muscle-map-female">
                    <img id="mobilebg-female" src="{{ asset('/images/body/female-mobilebg.png') }}">
                    <img id="female-traps-a" src="{{ asset('/images/body/female-traps-A.png') }}">
                    <img id="female-traps-b" src="{{ asset('/images/body/female-traps-B.png') }}">
                    <img id="female-shoulders-a" src="{{ asset('/images/body/female-deltoids-A.png') }}">
                    <img id="female-shoulders-b" src="{{ asset('/images/body/female-deltoids-B.png') }}">
                    <img id="female-pecs" src="{{ asset('/images/body/female-pecs.png') }}">
                    <img id="female-biceps-a" src="{{ asset('/images/body/female-biceps-A.png') }}">
                    <img id="female-biceps-b" src="{{ asset('/images/body/female-biceps-B.png') }}">
                    <img id="female-forearm-a" src="{{ asset('/images/body/female-forearms-A.png') }}">
                    <img id="female-forearm-b" src="{{ asset('/images/body/female-forearms-B.png') }}">
                    <img id="female-abdominals" src="{{ asset('/images/body/female-abdominals.png') }}">
                    <img id="female-quads-a" src="{{ asset('/images/body/female-quads-A.png') }}">
                    <img id="female-quads-b" src="{{ asset('/images/body/female-quads-B.png') }}">
                    <img id="female-calves-a" src="{{ asset('/images/body/female-calves-A.png') }}">
                    <img id="female-calves-b" src="{{ asset('/images/body/female-calves-B.png') }}">
                    <img id="female-back-traps-a" src="{{ asset('/images/body/female-traps-C.png') }}">
                    <img id="female-back-traps-b" src="{{ asset('/images/body/female-traps-D.png') }}">
                    <img id="female-back-shoulders-a" src="{{ asset('/images/body/female-deltoids-C.png') }}">
                    <img id="female-back-shoulders-b" src="{{ asset('/images/body/female-deltoids-D.png') }}">
                    <img id="female-triceps-a" src="{{ asset('/images/body/female-triceps-A.png') }}">
                    <img id="female-triceps-b" src="{{ asset('/images/body/female-triceps-B.png') }}">
                    <img id="female-back-lats-a" src="{{ asset('/images/body/female-lats-A.png') }}">
                    <img id="female-back-lats-b" src="{{ asset('/images/body/female-lats-B.png') }}">
                    <img id="female-back-lower" src="{{ asset('/images/body/female-lowerback.png') }}">
                    <img id="female-back-forearms-a" src="{{ asset('/images/body/female-forearms-C.png') }}">
                    <img id="female-back-forearms-b" src="{{ asset('/images/body/female-forearms-D.png') }}">
                    <img id="female-back-glutes" src="{{ asset('/images/body/female-glutes.png') }}">
                    <img id="female-back-hamstrings-a" src="{{ asset('/images/body/female-hamstrings-A.png') }}">
                    <img id="female-back-hamstrings-b" src="{{ asset('/images/body/female-hamstrings-B.png') }}">
                    <img id="female-back-calves-a" src="{{ asset('/images/body/female-calves-C.png') }}">
                    <img id="female-back-calves-b" src="{{ asset('/images/body/female-calves-D.png') }}">
                </div>
                <div id="muscle-map-female">
                    <img id="background-female" src="{{ asset('/images/body/Female-Figures.png') }}">
                    <img id="female-traps-a" src="{{ asset('/images/body/female-traps-A.png') }}">
                    <img id="female-traps-b" src="{{ asset('/images/body/female-traps-B.png') }}">
                    <img id="female-shoulders-a" src="{{ asset('/images/body/female-deltoids-A.png') }}">
                    <img id="female-shoulders-b" src="{{ asset('/images/body/female-deltoids-B.png') }}">
                    <img id="female-pecs" src="{{ asset('/images/body/female-pecs.png') }}">
                    <img id="female-biceps-a" src="{{ asset('/images/body/female-biceps-A.png') }}">
                    <img id="female-biceps-b" src="{{ asset('/images/body/female-biceps-B.png') }}">
                    <img id="female-forearm-a" src="{{ asset('/images/body/female-forearms-A.png') }}">
                    <img id="female-forearm-b" src="{{ asset('/images/body/female-forearms-B.png') }}">
                    <img id="female-abdominals" src="{{ asset('/images/body/female-abdominals.png') }}">
                    <img id="female-quads-a" src="{{ asset('/images/body/female-quads-A.png') }}">
                    <img id="female-quads-b" src="{{ asset('/images/body/female-quads-B.png') }}">
                    <img id="female-calves-a" src="{{ asset('/images/body/female-calves-A.png') }}">
                    <img id="female-calves-b" src="{{ asset('/images/body/female-calves-B.png') }}">
                    <img id="female-back-traps-a" src="{{ asset('/images/body/female-traps-C.png') }}">
                    <img id="female-back-traps-b" src="{{ asset('/images/body/female-traps-D.png') }}">
                    <img id="female-back-shoulders-a" src="{{ asset('/images/body/female-deltoids-C.png') }}">
                    <img id="female-back-shoulders-b" src="{{ asset('/images/body/female-deltoids-D.png') }}">
                    <img id="female-triceps-a" src="{{ asset('/images/body/female-triceps-A.png') }}">
                    <img id="female-triceps-b" src="{{ asset('/images/body/female-triceps-B.png') }}">
                    <img id="female-back-lats-a" src="{{ asset('/images/body/female-lats-A.png') }}">
                    <img id="female-back-lats-b" src="{{ asset('/images/body/female-lats-B.png') }}">
                    <img id="female-back-lower" src="{{ asset('/images/body/female-lowerback.png') }}">
                    <img id="female-back-forearms-a" src="{{ asset('/images/body/female-forearms-C.png') }}">
                    <img id="female-back-forearms-b" src="{{ asset('/images/body/female-forearms-D.png') }}">
                    <img id="female-back-glutes" src="{{ asset('/images/body/female-glutes.png') }}">
                    <img id="female-back-hamstrings-a" src="{{ asset('/images/body/female-hamstrings-A.png') }}">
                    <img id="female-back-hamstrings-b" src="{{ asset('/images/body/female-hamstrings-B.png') }}">
                    <img id="female-back-calves-a" src="{{ asset('/images/body/female-calves-C.png') }}">
                    <img id="female-back-calves-b" src="{{ asset('/images/body/female-calves-D.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection