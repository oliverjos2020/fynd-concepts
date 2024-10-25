<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;
use App\Models\User;
use App\Models\Service;

class Index extends Component
{
    public function render()
    {
        $users = User::where('role_id', 2)->where('is_profile_complete', 1)->limit(6)->get();
        $states = State::all();
        $services = Service::limit(3)->get();
        return view('livewire.home.index', ['states' => $states, 'users' => $users, 'services' => $services])->layout('components.home.home-master');
    }
}
