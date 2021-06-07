<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function show($id){
        $post = Post::findorfail($id);
        return view('posts.show', compact('post'));
    }
    public function create(){
        Post::create([
            'title' => 'testTitle',
            'author_name' => 'testAuthor',
            'post_text' => 'testText'
        ]);
        echo "The post has been created";
    }
}
