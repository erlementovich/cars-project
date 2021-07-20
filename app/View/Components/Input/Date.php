<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Date extends Component
{
    public $id;
    public $name;

    /**
     * Date constructor.
     * @param $id
     * @param $name
     */
    public function __construct(string $id = '', string $name = '')
    {
        $this->id = $id;
        $this->name = $name;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.date');
    }
}
