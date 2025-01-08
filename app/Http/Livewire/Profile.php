<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $userID;
    public function mount($userID)
    {
        $this->userID = $userID;
    }

    public function toggleStatus($user, $value)
    {
        User::find($user)->update([
            'status' => $value
        ]);
        $status = ($value == 1) ? 'Approved' : 'Declined';
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'User profile '.$status.' Successfully',
        ]);
        return;
    }
    public function render()
    {
        $user = User::where('id', $this->userID)->first();
        return view('livewire.profile', ['user' => $user])->layout('components.dashboard.dashboard-master');
    }
}
