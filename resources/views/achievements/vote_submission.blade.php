@extends('layouts.app')

@section('content')
    {{--@php--}}
    {{--dd($submission)--}}
    {{--@endphp--}}
    @if(isset($submission))
        <h1 class="titleheader" style="background: lightsalmon;text-align:center;">Decide if the achievement has ben accomplished or not</h1>
        <div>
        <div style="width:100%;display:flex;border:1px solid black;margin-bottom: 10px;">
            <div>
                <img style="width:150px;height:150px;" src="/storage/cover_images/{{$submission->achievement->icon}}" id={{$submission->id}}>
            </div>
            <div style="padding:10px;border-left: 1px solid black;width:100%;">
                <h3 style="text-align:center;color:white;background: mediumpurple;" >{{$submission->achievement->name}}</h3>
                <p>{{$submission->achievement->description}}</p>
            </div>

        </div>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{$submission->video_url}}" allowfullscreen></iframe>
        </div>
        <div class="row" style="margin-left:0px;padding:10px;width:100%;">
            <div class="col-md-4" style="padding:0px;" id="ajaxSubmityes">
                <a class=" btn btn-primary" style="width:100%;color:white;">Yay</a>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <h2>
                    or
                </h2>
            </div>
            <div class="col-md-4" style="padding:0px;" id="ajaxSubmitno">
                <a class=" btn btn-danger" style="width: 100%;color:white;">Nay</a>
            </div>
        </div>

    </div>
    @else
    <h3>There are no submissions at this time :(</h3>
    @endif



@endsection

@section('script_section')
    <script>var submission = <?php echo $submission; ?>;</script>
    <script src="{{ URL::to('js/vote_submission.js') }}"></script>
@endsection