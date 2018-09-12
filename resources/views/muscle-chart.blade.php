@extends('layouts.app')
@section('content')
    <div class="blog-post-title" style="margin-bottom: 20px;text-align: center;">
        <h1 class="titleheader" style="background-color: lightpink;">Click any of the highlighted areas for more details</h1>
    </div>
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
                    <img id="traps-a" class="traps" onclick="showpop(this);" src="{{ asset('/images/body/08-TrapsLeft.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="traps-b" class="traps" onclick="showpop(this);" src="{{ asset('/images/body/08-TrapsRight.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="shoulders-a" class="shoulders" onclick="showpop(this);" src="{{ asset('/images/body/07A-Deltoids.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="shoulders-b" class="shoulders" onclick="showpop(this);" src="{{ asset('/images/body/07B-Deltoids.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="pecs" class="pecs" onclick="showpop(this);" src="{{ asset('/images/body/06-Pecs.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="biceps-a" class="biceps" onclick="showpop(this);" src="{{ asset('/images/body/05A-Biceps.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="biceps-b" class="biceps" onclick="showpop(this);" src="{{ asset('/images/body/05B-Biceps.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="forearm-a" class="forearm" onclick="showpop(this);" src="{{ asset('/images/body/14A-Forearms.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="forearm-b" class="forearm" onclick="showpop(this);" src="{{ asset('/images/body/14B-Forearms.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="obliques" class="abdominals" onclick="showpop(this);" src="{{ asset('/images/body/04-Obliques.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="quads-a" class="quads" onclick="showpop(this);" src="{{ asset('/images/body/01A-Quads.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="quads-b" class="quads" onclick="showpop(this);" src="{{ asset('/images/body/01B-Quads.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="calves-a" class="calves" onclick="showpop(this);" src="{{ asset('/images/body/13A-Calves.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="calves-b" class="calves" onclick="showpop(this);" src="{{ asset('/images/body/13B-Calves.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-traps-a" class="traps" onclick="showpop(this);" src="{{ asset('/images/body/08B-Traps.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-traps-b" class="upper-back" onclick="showpop(this);" src="{{ asset('/images/body/08C-Traps.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-shoulders-a" class="shoulders" onclick="showpop(this);" src="{{ asset('/images/body/07C-Deltoids.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-shoulders-b" class="shoulders" onclick="showpop(this);" src="{{ asset('/images/body/07D-Deltoids.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="triceps-a" class="triceps" onclick="showpop(this);" src="{{ asset('/images/body/09A-Triceps.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="triceps-b" class="triceps" onclick="showpop(this);" src="{{ asset('/images/body/09B-Triceps.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-lats-a" class="lats" onclick="showpop(this);" src="{{ asset('/images/body/10A-Lats.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-lats-b" class="lats" onclick="showpop(this);" src="{{ asset('/images/body/10B-Lats.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-lower" class="lower-back" onclick="showpop(this);" src="{{ asset('/images/body/15-Lower-Back.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-forearms-a" class="forearm" onclick="showpop(this);" src="{{ asset('/images/body/14C-Forearms.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-forearms-b" class="forearm" onclick="showpop(this);" src="{{ asset('/images/body/14D-Forearms.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-glutes" class="glutes" onclick="showpop(this);" src="{{ asset('/images/body/11-Glutes.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-hamstrings-a" class="hamstrings" onclick="showpop(this);" src="{{ asset('/images/body/12A-Hamstrings.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-hamstrings-b" class="hamstrings" onclick="showpop(this);" src="{{ asset('/images/body/12B-Hamstrings.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-calves-a" class="calves" onclick="showpop(this);" src="{{ asset('/images/body/13C-Calves.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="back-calves-b" class="calves" onclick="showpop(this);" src="{{ asset('/images/body/13D-Calves.png') }}" data-toggle="popover" title="" data-content=""></div>
            </div>
            <div id="femalefigures" style="display: none;">
                <div id="muscle-map-female">
                    <img id="background-female" class="" onclick="showpop(this);" src="{{ asset('/images/body/Female-Figures.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-traps-a" class="traps" onclick="showpop(this);" src="{{ asset('/images/body/female-traps-A.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-traps-b" class="traps" onclick="showpop(this);" src="{{ asset('/images/body/female-traps-B.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-shoulders-a" class="shoulders" onclick="showpop(this);" src="{{ asset('/images/body/female-deltoids-A.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-shoulders-b" class="shoulders" onclick="showpop(this);" src="{{ asset('/images/body/female-deltoids-B.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-pecs" class="pecs" onclick="showpop(this);" src="{{ asset('/images/body/female-pecs.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-biceps-a" class="biceps" onclick="showpop(this);" src="{{ asset('/images/body/female-biceps-A.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-biceps-b" class="biceps" onclick="showpop(this);" src="{{ asset('/images/body/female-biceps-B.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-forearm-a" class="forearm" onclick="showpop(this);" src="{{ asset('/images/body/female-forearms-A.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-forearm-b" class="forearm" onclick="showpop(this);" src="{{ asset('/images/body/female-forearms-B.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-abdominals" class="abdominals" onclick="showpop(this);" src="{{ asset('/images/body/female-abdominals.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-quads-a" class="quads" onclick="showpop(this);" src="{{ asset('/images/body/female-quads-A.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-quads-b" class="quads" onclick="showpop(this);" src="{{ asset('/images/body/female-quads-B.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-calves-a" class="calves" onclick="showpop(this);" src="{{ asset('/images/body/female-calves-A.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-calves-b" class="calves" onclick="showpop(this);" src="{{ asset('/images/body/female-calves-B.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-traps-a" class="traps" onclick="showpop(this);" src="{{ asset('/images/body/female-traps-C.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-traps-b" class="traps" onclick="showpop(this);" src="{{ asset('/images/body/female-traps-D.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-shoulders-a" class="shoulders" onclick="showpop(this);" src="{{ asset('/images/body/female-deltoids-C.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-shoulders-b" class="shoulders" onclick="showpop(this);" src="{{ asset('/images/body/female-deltoids-D.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-triceps-a" class="triceps" onclick="showpop(this);" src="{{ asset('/images/body/female-triceps-A.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-triceps-b" class="triceps" onclick="showpop(this);" src="{{ asset('/images/body/female-triceps-B.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-lats-a" class="lats" onclick="showpop(this);" src="{{ asset('/images/body/female-lats-A.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-lats-b" class="lats" onclick="showpop(this);" src="{{ asset('/images/body/female-lats-B.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-lower" class="lower-back" onclick="showpop(this);" src="{{ asset('/images/body/female-lowerback.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-forearms-a" class="forearm" onclick="showpop(this);" src="{{ asset('/images/body/female-forearms-C.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-forearms-b" class="forearm" onclick="showpop(this);" src="{{ asset('/images/body/female-forearms-D.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-glutes" class="glutes" onclick="showpop(this);" src="{{ asset('/images/body/female-glutes.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-hamstrings-a" class="hamstrings" onclick="showpop(this);" src="{{ asset('/images/body/female-hamstrings-A.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-hamstrings-b" class="hamstrings" onclick="showpop(this);" src="{{ asset('/images/body/female-hamstrings-B.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-calves-a" class="calves" onclick="showpop(this);" src="{{ asset('/images/body/female-calves-C.png') }}" data-toggle="popover" title="" data-content="">
                    <img id="female-back-calves-b" class="calves" onclick="showpop(this);" src="{{ asset('/images/body/female-calves-D.png') }}" data-toggle="popover" title="" data-content="">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_section')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ URL::to('js/muscle_chart.js') }}"></script>
@stop