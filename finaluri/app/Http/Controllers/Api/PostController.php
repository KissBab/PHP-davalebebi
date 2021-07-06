<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('comments')->get();
    }

    public function comment(Request $request)
    {
        Comment::create([
            'comment' => $request->get('comment')
        ]);
        return redirect()->back();
    }

    public function store(Request $request)
    {
        Post::create([
            'title' => $request->get('title'),
            'post_text' => $request->get('post_text'),
            'author_name' => $request->get('author_name'),
        ]);
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $post = Post::findorfail($id);
        $post->update($request->all());
        return redirect()->back();
    }

    public function delete($id){
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->back();
    }
}
