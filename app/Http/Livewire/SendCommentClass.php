<?php

namespace App\Http\Livewire;

use Pusher\Pusher;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SendCommentClass extends Component
{
    public $comment;
    public $model;


    public function mount()
    {

        $this->comment ='';


    }

    public function render()
    {
        return view('livewire.send-comment-class');
    }

    public function commentable()
    {
        $this->model->commentable()->create(
            [
                'comment'=>$this->comment,
                'user_id'=>1
            ]
        );
        $data = [
            'comment'=>$this->comment,
            'user_id'=>1
        ];
			$pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), array('cluster' => env('PUSHER_APP_CLUSTER')));
		//we emit a trigger that will be heard b the other component
			$pusher->trigger('comment-channel', "comment-event-{$this->model->id}", ['comment' => $this->comment]);
            $this->comment = '';
		//You do not need to emit a laravel event. Pusher already provides triggers.
        //event(new \App\Events\EmitComment($this->comment));
    }
}
