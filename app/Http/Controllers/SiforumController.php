<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiforumController extends Controller
{
    public function index()
    {
        $title = 'Delete Post!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.siforum.index', [
            'posts' => Post::with('user')->latest()->get()
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.siforum.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
            'body'  => $request->body
        ]);

        return redirect()->route('siforum.index')->with('success', 'Post was updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('siforum.index')->with('success', 'Post was deleted!');
    }
}
