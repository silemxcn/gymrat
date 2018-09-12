@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                {{--@if (session('status'))--}}
                {{--<div class="alert alert-success">--}}
                {{--{{ session('status') }}--}}
                {{--</div>--}}
                {{--@endif--}}

                {{--</div>--}}
                {{--</div>--}}
                @if(count($exercises) > 0)
                    @foreach($exercises as $exercise)
                        <div class="card" style="margin-bottom: 20px;">
                            <div class="row">
                                <div class="col-md-6" style="padding-right:0px;">
                                    <a href="/exercises/{{$exercise->id}}">
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
                                            <div>
                                                <img  style="width:100%;height:100%;object-fit:contain;" src="/storage/cover_images/noimage.jpg">
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="col-md-6" style="padding-left:0px;">
                                    <div class="card-header exercise-header">
                                        <a style="color: white;font-size:18px;" href="/exercises/{{$exercise->id}}">{{$exercise->title}}</a>
                                    </div>

                                    <div class="card-body" style="padding-bottom:0px;">
                                        <p style="margin-bottom:10px;">Type: <span style="color:lightseagreen;text-transform: capitalize;">{{$exercise->type}}</span></p>
                                        <p style="margin-bottom:10px;">Muscle group: <span style="color:lightseagreen;text-transform: capitalize;">{{$exercise->muscle_group}}</span></p>
                                        @if(isset($exercise->user))
                                            <p style="margin-bottom:10px;">Added by: <span style="color:lightseagreen;text-transform: capitalize;">{{$exercise->user->name}}</span></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No exercises found</p>
                @endif
            </div>
        </div>
    </div>
@endsection
