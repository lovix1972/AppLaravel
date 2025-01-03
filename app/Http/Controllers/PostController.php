<?php

use App\Models\Post;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all(), 200);

    }

    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return response()->json($post, 200);

        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|integer'

        ]);
        $post = Post::create([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|integer'

        ]);
        return response()->json($post, 201);

    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        if ($post) {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);
            $post->update($request->only(['title', 'content']));
            return response()->json($post, 200);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return response()->json(['message'=> 'Post deleted'], 200);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }
}

