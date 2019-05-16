@extends('layouts.default')

@section('title', 'სიახლეები')

@section('content')
    @foreach($posts as $post)
        <div class="posts-area area">
            <div class="short-post">
                <p class="title">{{ $post->title }}</p>
                <p class="shortbody ">
                    <img src="{{ asset('img') }}/{{ $post->img }}" class="rounded" >
                    {!! $post->miniContent !!}
                </p>
                <a href="{{ route('showposts',["id"=>$post->id]) }}" class="btn btn-primary text-light">სრულად ნახვა</a>
            </div>
            
            <br>
        </div>
    @endforeach
    <div class="justify-content-center d-flex">{{ $posts->links() }}</div>
@endsection