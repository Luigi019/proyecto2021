<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListComments extends Component
{
    public $course;
    public $comments;

    protected $listeners = ['receivedComment'];

    public function mount()
    {
        $this->comments = [];
    }

    public function receivedComment($comment)
    {
        $this->comments[] = $comment;

    }

    public function render()
    {
        return view('livewire.list-comments');
    }
}
