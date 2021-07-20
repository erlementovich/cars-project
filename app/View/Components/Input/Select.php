<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Select extends Component
{
    public $id;
    public $options;
    public $name;

    /**
     * Select constructor.
     * @param $id string
     * @param $options array
     * @param $name string
     */
    public function __construct(string $id = '', array $options = [], string $name = '')
    {
        $this->id = $id;
        $this->options = $options;
        $this->name = $name;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
