<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Text extends Component
{
    public $id = '';
    public $placeholder = '';
    public $name= '';

    /**
     * Text constructor.
     * @param string $id
     * @param string $placeholder
     * @param string $name
     */
    public function __construct(string $id, string $placeholder, string $name)
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
        return view('components.forms.text');
    }
}
