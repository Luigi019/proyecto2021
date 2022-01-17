<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class ListCourses extends Component
{   
    public $data;
    public $search = '';
    public $var;
    public $modal;
    public $type = '';
    protected $listeners = ['getSearch'];
    public function render()
    {
        return view('livewire.list-courses');
    }

    public function getSearch($search){

        $this->search = $search;
        if($this->type === 'lessons'){
            $data = Lesson::query();
        }else{
            $data = Course::withoutGlobalScopes()->where('type', $this->type);
        }

        $this->data = $data->orderBy('created_at' , 'desc')->where('title', 'like', '%' . $this->search . '%')->orWhereHas('teacher', function($query){
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->get();

    }
}
