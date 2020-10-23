<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubComponent extends Component
{
    public $other = 'Bob';
    public $random = 'random';

    public function render()
    {
        return view('livewire.sub-component');
    }
}
