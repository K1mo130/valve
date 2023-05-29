<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Auth;

class LikeController extends Controller {
    //de gebruiker die uitgelogd is kan geen like geven aan de posts.
    public function __construct() {
        $this->middleware('auth');
    }

    public function like($postid, Request $request) {
        
        $post = Post::findOrFail($postid);
        if($post->user_id == Auth::user()->id) {
            abort(403, 'Cannot like own post');
        }

        $like = Like::where('post_id', '=', $postid)->where('user_id', '=', Auth::user()->id)->first();

        if($like != NULL) {
            abort(403,'Cannot like a post more than once');
        }
        
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->post_id = $postid;
        $like->save();

        return redirect()->route('index')->with('status', 'Post liked');
    }
}
