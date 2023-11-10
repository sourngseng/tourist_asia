<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{

    public function index(): JsonResponse
    {
        $posts = Post::all()->toArray();
        return response()->json($posts);
    }

    public function create()
    {
    }

    public function store(Request $request) : JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::create($validated);
        return response()->json(['status' => 'Post created.']);
    }

    public function show(Post $post)
    {
    }

    public function edit(Post $post) : JsonResponse
    {
        $record = Post::find($post->id)->toArray();
        return response()->json($record);
    }

    public function update(Request $request, Post $post) : JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]); 

        $post->update($validated);

        return response()->json(['status' => 'Post updated.']);
    }

    public function destroy(Post $post) : JsonResponse
    {
        $post->delete();
        return response()->json(['status' => 'Post deleted.']);
    }


}
