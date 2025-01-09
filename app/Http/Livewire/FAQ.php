<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FAQ extends Component
{
    public function render()
    {
        return view('livewire.home.f-a-q')->layout('components.home.home-master');
    }
}
