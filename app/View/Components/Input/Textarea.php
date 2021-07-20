<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $id;
    public $placeholder;
    public $name;

    /**
     * Textarea constructor.
     * @param $id
     * @param $placeholder
     * @param $name
     */
    public function __construct(string $placeholder = '', string $name = '', string $id = '')
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->name = $name;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.textarea');
    }
}
