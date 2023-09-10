<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request,Post $post)
    {
        //dd($request->user()->id);
        //dd($post->id);
        //dd("Dando like");
        $post->likes()->create([
            'user_id'=> $request->user()->id
        ]);

        return back();
    }

    public function destroy(Request $request, Post $post){
        //dd('eliminando like');
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }    
}
