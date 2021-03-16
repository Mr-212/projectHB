<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckedtAtComment extends Component
{



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
//        dd($wire_modal);
//        $this->wire_modal = $wire_modal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.checked-at-comment');
    }
}
