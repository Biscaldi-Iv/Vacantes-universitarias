<?php

namespace App\View\Components;

use Illuminate\View\Component;

class userinputs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user;
    public $universidades;

    public function __construct($universidades = null, $user = null)
    {

        if (!is_null($universidades)) {
            $this->universidades = $universidades;
        }
        if (!is_null($user)) {
            $this->user = $user;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-inputs');
    }
}
