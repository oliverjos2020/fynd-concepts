<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;
use App\Models\User;
use App\Models\Service;
use Livewire\WithPagination;

class Listing extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = User::where('role_id', 2)->where('is_profile_complete', 1)->latest()->paginate(10);
        $states = State::all();
        $services = Service::limit(3)->get();
        return view('livewire.home.listing', ['states' => $states, 'users' => $users, 'services' => $services])->layout('components.home.home-master');
        return view('livewire.listing');
    }
}
