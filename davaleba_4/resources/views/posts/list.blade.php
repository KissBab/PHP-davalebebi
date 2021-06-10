@extends('layout.app')
@section('content')
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Name</th>
            <th scope="col">Created at</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th>{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->author_name}}</td>
            <td>{{$post->created_at}}</td>
            <td>
                <a class="nav-link disabled" href="{{route('posts.edit', $post->id)}}">Edit</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{$posts->links()}}

@endsection
