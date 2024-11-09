<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
@include('partials.menu');
class CreaPostController extends Controller
{
    public function creaPost(){
        //Recupera tutti i Post
        $posts = Post::create([


            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return view('posts.create', ['posts' => $posts]);
    }
}
