@extends('layouts.app')

@section('content')
            <div class="col-md-12" style="display: flex;flex-wrap: wrap;">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if(count($routines) > 0)
                    @foreach($routines as $routine)
                        <div class="routine-card glow-card">
                            <a href="/routines/{{$routine->id}}" class="no-underline" style="">
                                <div>
                                    <div style="height:180px;overflow: hidden;">
                                        @if($routine->poster != "noimage.jpg")
                                            <img  class="routine-thumb" src="/storage/cover_images/{{$routine->poster}}">
                                        @else
                                            <img  class="routine-thumb" style="border-bottom:1px solid black;" src="/storage/cover_images/exercisenoimage.jpg">
                                        @endif
                                    </div>
                                    <div class="routine-body" style="padding:20px;background:white;">
                                        <div>
                                            <span class="rbody-text" style="color:black;font-size:18px;font-family: sans-serif;">{{$routine->title}}</span>
                                        </div>
                                        <div>
                                            <span class="rbody-text" style="color:black;font-size:15px;font-family: sans-serif;">{{$routine->type}} | {{$routine->duration}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p>No workouts found</p>
                @endif
            </div>
@endsection
