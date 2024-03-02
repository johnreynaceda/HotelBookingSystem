<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;


class CommentList extends Component
{
    public function render()
    {
        return view('livewire.admin.comment-list',[
            'comments' => Comment::all(),
        ]);
    }
}
