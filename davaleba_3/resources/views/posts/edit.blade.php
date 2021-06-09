@extends('layout.app')
@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2" style="margin: 20px">
                <form method="POST" action="{{route('posts.update', $post -> id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post Title</label>
                        <input name="title" type="text" class="form-control"
                               id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post Title", value="{{old('title', $post->title)}}">
                        <small id="emailHelp" class="form-text text-muted">Post Title.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post Text</label>
                        <input name="post_text" type="text" class="form-control"
                               id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post Text", value="{{old('post_text', $post->post_text)}}">
                        <small id="emailHelp" class="form-text text-muted">Post Text.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Author Name</label>
                        <input name="author_name" type="text" class="form-control"
                               id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Author", value="{{old('author_name', $post->author_name)}}">
                        <small id="emailHelp" class="form-text text-muted">Post Author.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
