<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Photo;

class SingleArtisan extends Component
{
    public $artisanID;

    public function mount($artisanID)
    {
        $this->artisanID = $artisanID;
    }
    public function render()
    {
        $user = User::findOrFail($this->artisanID);

        // return view('livewire.home.index', ['states' => $states, 'users' => $users])->layout('components.home.home-master');
        return view('livewire.home.single-artisan',['user' => $user])->layout('components.home.home-master');
    }
}
