@extends('layouts.default')

@section('title', 'პოსტის სათაური')

@section('content')

    <div class="posts-area area">
        <div class="long-post">
            <div class="d-flex justify-content-between">
                <p class="title">{{ $post->title}}</p>
                <a href="{{ route('posts') }}">
                    <i class="fa fa-arrow-left text-primary" aria-hidden="true"></i >
                    უკან დაბრუნება  
                </a>
                
            </div>
            <p class="body">
                <img src="{{ asset('img') }}/{{ $post->img }}" class="rounded" >
                {!!$post->content!!}
            </p>
        </div>
        <br>
    </div>
@endsection