<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Button extends Component
{
    public $class;
    public $text;

    /**
     * Button constructor.
     * @param $class
     * @param $text
     */
    public function __construct(string $class = 'bg-gray-400', string $text = 'Подробнее')
    {
        $this->class = $class;
        $this->text = $text;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.button');
    }
}
