<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $name;
    public $label;

    /**
     * Checkbox constructor.
     * @param $name
     * @param $label
     */
    public function __construct(string $name = '', string $label = '')
    {
        $this->name = $name;
        $this->label = $label;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.checkbox');
    }
}
