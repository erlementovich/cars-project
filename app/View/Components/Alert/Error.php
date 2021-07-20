<?php

namespace App\View\Components\Alert;

use Illuminate\View\Component;

class Error extends Component
{
    public $message;

    /**
     * Success constructor.
     * @param $message
     */
    public function __construct(string $message = 'Сообщение')
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alerts.error');
    }
}
