<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
        'title'     => 'required|min:3',
        'content'   => 'required|min:20',
    ]);

    $post = new Post;
    $post->title = $validated['title'];
    $post->message = $validated['content'];
    $post->user_id = Auth::user()->id;
    $post->save();
    
    return redirect()->route('index')->with('status', 'post added');
    }
}
