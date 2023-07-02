<?php

namespace App\Http\Livewire;

use App\Models\Comment as ModelsComment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $body, $post, $edit_comment_id, $body2, $comment_id;

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.comment', [
            'comments' => ModelsComment::with('post')
                ->where('post_id', $this->post->id)
                ->whereNull('comment_id')
                ->latest()
                ->get(),
        ]);
    }

    public function store()
    {
        $this->validate([
            'body' => 'required'
        ]);

        ModelsComment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body'    => $this->body
        ]);

        return redirect()->route('siforum.show', $this->post)->with('success', 'Comment was submitted!');
    }

    public function selectEdit($id)
    {
        $comment = ModelsComment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->body2 = $comment->body;
        $this->comment_id = null;
    }

    public function change()
    {
        $this->validate([
            'body2' => 'required'
        ]);

        ModelsComment::where('id', $this->edit_comment_id)->update([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body'    => $this->body2
        ]);

        $this->edit_comment_id = null;

        return redirect()->route('siforum.show', $this->post)->with('success', 'Comment was updated!');
    }

    public function delete($id)
    {
        ModelsComment::where('id', $id)->delete();
        return redirect()->route('siforum.show', $this->post)->with('success', 'Comment was deleted!');
    }

    public function selectReply($id)
    {
        $this->comment_id = $id;
        $this->edit_comment_id = null;
        $this->body2 = null;
    }

    public function reply()
    {
        $this->validate([
            'body2' => 'required'
        ]);
        $comment = ModelsComment::find($this->comment_id);
        $comment = ModelsComment::create([
            'user_id'       => Auth::user()->id,
            'post_id'       => $this->post->id,
            'body'          => $this->body2,
            'comment_id'    => $comment->comment_id ? $comment->comment_id : $comment->id
        ]);

        return redirect()->route('siforum.show', $this->post)->with('success', 'Comment was submitted!');
    }
}
