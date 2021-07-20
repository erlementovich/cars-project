<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Group extends Component
{
    public $label;
    public $for;

    /**
     * Group constructor.
     * @param string $label
     * @param string $for
     */
    public function __construct(string $label = '', string $for = '')
    {
        $this->label = $label;
        $this->for = $for;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.group');
    }
}
