<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $incomingdata = $request->validate([
           'title' => ['required'],
           'body' => ['required'],
        ]);

        $incomingdata['title'] = strip_tags($incomingdata['title']);
        $incomingdata['body'] = strip_tags($incomingdata['body']);
        $incomingdata['user_id'] = auth()->id();
        Post::create($incomingdata);
        return redirect('/');
    }
}
