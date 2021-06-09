@extends('layout.app')
@section('content')
    @foreach($posts as $post)
        <div class="card text-white bg-dark mb-3" style="margin: 20px;">
            <div class="card-header">{{$post->title}}</div>
            <div class="card-body">
                <h5 class="card-title">{{$post->author_name}}</h5>
                <p class="card-text">{{$post->post_text}}</p>
            </div>
        </div>
    @endforeach
@endsection
