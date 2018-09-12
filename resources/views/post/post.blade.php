@extends('layouts.app')
@section('content')
    <div class="blog-single blog-style-large">

        <article class="col-md-12">
            <div class="post-container">

                <div class="post-meta-thumb" style="margin-bottom: 30px;">
                    @if($post->cover_image != "noimage.jpg")
                        <img src="/storage/cover_images/{{$post->cover_image}}" width="100%">
                    @endif
                </div>
                <div class="post-body-content">
                    <a href="" style="color:#3f3f3f;" class="post-title">
                        <h1>{{$post->title}}</h1>
                    </a>

                    <div class="post-meta-data sh-columns" style="padding-bottom: 10px;border-bottom:1px solid;margin-bottom:10px;border-color:lightslategray;">
                        <div class="">

                            <span style="font-family:sans-serif;color:#7e7e7e;"> by <a href="">{{$post->user->name}}</a>

                            {{$post->date_posted}}
                            </span>
                            {{--@php--}}
                            {{--dd($post);--}}
                            {{--@endphp--}}
                        </div>
                    </div>

                    @if($post->video_link != 'novideolink')
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{$post->video_url}}" allowfullscreen></iframe>
                    </div>
                        <hr>
                    @endif
                    <div class="post-content" style="border:none;">
                        <p style="white-space: pre-wrap;">{{$post->body}}</p>
                    </div>
                    @auth
                        @if(Auth::user()->id == $post->user_id)
                            <div class="row" style="margin-left:0px;">
                                <a style="margin-right: 10px;" href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>

                                {!!Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
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