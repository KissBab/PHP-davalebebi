<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }
    public function list(){
        $posts = Post::paginate(10);
        return view('posts.list', compact('posts'));
    }
    public function show($id){
        $post = Post::findorfail($id);
        return view('posts.show', compact('post'));
    }
    public function create(){
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }
    public function store(Request $request){
        $post = Post::create([
            'title' => $request->get('title'),
            'post_text' => $request->get('post_text'),
            'author_name' => $request->get('author_name'),
        ]);
        $post ->tags()->sync($request->get('tags'));
        return redirect()->back();
    }
    public function edit($id){
        $post = Post::findorfail($id);
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
    }
    public function update(Request $request, $id){
        $post = Post::findorfail($id);
        $post->update($request->all());
        $post ->tags()->sync($request->get('tags'));
        return redirect()->back();
    }
    public function delete($id){
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->back();
    }
}
