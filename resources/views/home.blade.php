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
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-header media" style="padding:10px;">
                            <div>
                                <a href="#">
                                    <img src="/storage/cover_images/{{$post->user->profile_pic}}" style="border-radius:50%;" width="50" height="50" alt="Avatar" class="media-object photo-profile">
                                </a>
                            </div>
                            <div style="margin-left:10px;">
                                <a style="font-size:16px;" href="/posts/{{$post->id}}">{{$post->title}}</a>
                                <p style="margin-bottom:0;">
                                    <span style="font-family:sans-serif;color:#8d8d8d;">
                                        @php
                                            if($post->today)
                                                $text = "Posted ".$post->post_age." ago";
                                            else{
                                                $text ="Posted on ".$post->date_posted." at ".$post->hour_posted;
                                            }
                                        @endphp
                                        {{$text}} by <a style="color:#7e7e7e;">{{$post->user->name}}</a>
                                    </span>
                                </p>
                            </div>

                        </div>

                        <div style="padding:0px;" class="card-body">
                            <div style="padding:10px;color:#8d8d8d;max-height:100px;overflow:hidden;" class="post-body">
                                {{$post->body}}
                            </div>
                            @if($post->cover_image != "noimage.jpg")
                                <div class="post-image">
                                    <a href="/posts/{{$post->id}}">
                                        <img  style="width:100%;" src="/storage/cover_images/{{$post->cover_image}}">
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                @endforeach
            @else
                <p>No posts found</p>
            @endif
                {{--@php--}}
                    {{--dd($posts[0]);--}}
                {{--@endphp--}}
            {{--////--}}
                {{--<div class="container">--}}
                    {{--<div class="col-md-5">--}}
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-body">--}}
                                {{--<section class="post-heading">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-11">--}}
                                            {{--<div class="media">--}}
                                                {{--<div class="media-left">--}}
                                                    {{--<a href="#">--}}
                                                        {{--<img class="media-object photo-profile" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="40" height="40" alt="...">--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                                {{--<div class="media-body">--}}
                                                    {{--<a href="#" class="anchor-username"><h4 class="media-heading">Bayu Darmantra</h4></a>--}}
                                                    {{--<a href="#" class="anchor-time">51 mins</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-1">--}}
                                            {{--<a href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</section>--}}
                                {{--<section class="post-body">--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras--}}
                                        {{--turpis sem, dictum id bibendum eget, malesuada ut massa. Ut scel--}}
                                        {{--erisque nulla sed luctus dapibus. Nulla sit amet mi vitae purus sol--}}
                                        {{--licitudin venenatis. Praesent et sem urna. Integer vitae lectus nis--}}
                                        {{--l. Fusce sapien ante, tristique efficitur lorem et, laoreet ornare lib--}}
                                        {{--ero. Nam fringilla leo orci. Vivamus semper quam nunc, sed ornare magna dignissim sed. Etiam interdum justo quis risus--}}
                                        {{--efficitur dictum. Nunc ut pulvinar quam. N--}}
                                        {{--unc mollis, est a dapibus dignissim, eros elit tempor diam, eu tempus quam felis eu velit.</p>--}}
                                {{--</section>--}}
                                {{--<section class="post-footer">--}}
                                    {{--<hr>--}}
                                    {{--<div class="post-footer-option container">--}}
                                        {{--<ul class="list-unstyled">--}}
                                            {{--<li><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> Like</a></li>--}}
                                            {{--<li><a href="#"><i class="glyphicon glyphicon-comment"></i> Comment</a></li>--}}
                                            {{--<li><a href="#"><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div class="post-footer-comment-wrapper">--}}
                                        {{--<div class="comment-form">--}}

                                        {{--</div>--}}
                                        {{--<div class="comment">--}}
                                            {{--<div class="media">--}}
                                                {{--<div class="media-left">--}}
                                                    {{--<a href="#">--}}
                                                        {{--<img class="media-object photo-profile" src="http://0.gravatar.com/avatar/38d618563e55e6082adf4c8f8c13f3e4?s=40&d=mm&r=g" width="32" height="32" alt="...">--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                                {{--<div class="media-body">--}}
                                                    {{--<a href="#" class="anchor-username"><h4 class="media-heading">Media heading</h4></a>--}}
                                                    {{--<a href="#" class="anchor-time">51 mins</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</section>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--//////////--}}
        </div>
    </div>
</div>
@endsection
