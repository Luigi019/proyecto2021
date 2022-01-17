<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{

    public $create;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($create = null)
    {
        if($create !==null)
        {
            $this->create = explode(',' , $create);

        }
        else {
            $this->create = $create;
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
