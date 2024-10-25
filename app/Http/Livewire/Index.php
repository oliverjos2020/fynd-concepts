<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;
use App\Models\User;

class Index extends Component
{
    public function render()
    {
        $users = User::all();
        $states = State::all();
        return view('livewire.home.index', ['states' => $states, 'users' => $users])->layout('components.home.home-master');
    }
}
