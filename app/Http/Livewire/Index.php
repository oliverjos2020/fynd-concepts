<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;

class Index extends Component
{
    public function render()
    {
        $states = State::all();
        return view('livewire.home.index', ['states' => $states])->layout('components.home.home-master');
    }
}
