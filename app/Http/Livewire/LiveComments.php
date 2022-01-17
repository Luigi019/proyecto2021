<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\EmitComment;
class LiveComments extends Component
{
    public $comment;
    public $model;

  
    public function mount()
    {
       
        $this->comment ='';

        
    }

    public function render()
    {
        return view('livewire.live-comments');
    }

    public function commentable()
    {
        $data = [ 
            'comment' =>$this->comment,
            'user_id' =>1,
        ];
        $this->model->commentable()->create($data);
        //$this->emit('emitComment');
        $this->emit('receivedComment' , $data);
    }
}
