<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Mail\NotifyArtisan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class Artisans extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $limit = '10';

    protected $queryString = ['limit', 'search'];

     public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingLimit()
    {
        $this->resetPage();
    }

    public function changeStatus($user, $value)
    {
        User::find($user)->update([
            'lock_user' => $value
        ]);
        $status = ($value == 1) ? 'Locked' : 'Unlocked';
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'User profile '.$status.' Successfully',
        ]);
        return;
    }

    public function sendMail($email)
    {
        try {
            Mail::to($email)->send(new NotifyArtisan($email));
            User::where('email', $email)->update([
                'send_mail' => 1
            ]);
            $this->dispatchBrowserEvent('notify', [
                'type' =>'success',
                'message' => 'Email sent successfully',
            ]);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
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
        $users = User::where('name', 'like', '%' . $this->search . '%')->where('role_id', 2)->orderBy('updated_at', 'desc')->paginate($this->limit);
        return view('livewire.artisans', ['users' => $users])->layout('components.dashboard.dashboard-master');
    }
}
