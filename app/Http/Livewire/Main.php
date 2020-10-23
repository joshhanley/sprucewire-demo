<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $name = "Bob";
    public $sample = "test";

    public function render()
    {
        return view('livewire.main');
    }
}
