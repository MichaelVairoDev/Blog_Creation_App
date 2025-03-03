<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image_url' => 'nullable|url',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['status'] = 'published';

        Post::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Post creado exitosamente.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image_url' => 'nullable|url',
        ]);

        $post->update($validatedData);

        return redirect()->route('posts.show', $post)->with('success', 'Post actualizado exitosamente.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado exitosamente.');
    }
}
