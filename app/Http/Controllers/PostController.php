<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Auth;

class PostController extends Controller {
    // The user who is logged out will not be able to visit the post pages except the 'index' page
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index() {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title'       => 'required|min:3',
            'content'     => 'required|min:20',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post;
        $post->title = $validated['title'];
        $post->message = $validated['content'];
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->cover_image = $imageName;
        }

        $post->save();

        return redirect()->route('index')->with('status', 'Post added successfully.');
    }

    public function edit($id) {
        $post = Post::findOrFail($id);

        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can edit news.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update($id, Request $request) {
        $post = Post::findOrFail($id);

        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can update news.');
        }

        $validated = $request->validate([
            'title'   => 'required|min:3',
            'content' => 'required|min:20',
        ]);

        $post->title = $validated['title'];
        $post->message = $validated['content'];

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->cover_image = $imageName;
        }

        $post->save();

        return redirect()->route('index')->with('status', 'Post edited successfully.');
    }

    public function destroy($id) {
        if (!Auth::user()->is_admin) {
            abort(403, 'Only admins can delete news.');
        }

        $post = Post::findOrFail($id);

        // Delete the likes associated with the post
        $likes = Like::where('post_id', '=', $post->id)->delete();

        // Delete the cover image file if it exists
        if ($post->cover_image) {
            $imagePath = public_path('images/' . $post->cover_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $post->delete();

        return redirect()->route('index')->with('status', 'Post deleted successfully.');
    }
}
