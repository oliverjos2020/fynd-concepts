<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Photo;
use App\Models\Review;
use Livewire\Component;
use App\Models\ReportArtisan;

class SingleArtisan extends Component
{
    public $artisanID;
    public $myIrating;
    public $review;
    public $message;

    public function mount($artisanID)
    {
        $this->artisanID = $artisanID;
    }

    public function updatedMyrating()
    {
        // dd($this->myrating);
        $this->myIrating = $this->myIrating;
    }

    public function store()
    {
        // dd($this->myrating);

        $this->validate([
            // 'artisan_id' => ['required|exists:users,id'],
            'myIrating' => ['required', 'numeric', 'min:1','max:5'],
            'review' => ['required'],
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'artisan_id' => $this->artisanID,
            'rating' => $this->myIrating,
            'review' => $this->review,
        ]);
        $this->reset(['myIrating', 'review']);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Review Submitted Successfully',
        ]);
    }

    public function report()
    {
        $this->validate([
            'message' => ['required'],
        ]);

        ReportArtisan::create([
            'artisan_id' => $this->artisanID,
            'user_id' => auth()->id(),
            'message' => $this->message
        ]);

        $this->reset(['message']);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Report Submitted Successfully',
        ]);
    }
    public function render()
    {
        $user = User::findOrFail($this->artisanID);
        $myReview = Review::where('artisan_id', $this->artisanID)->get();
        $similarArtisans = User::where('service_id', $user->service_id)->get();
        return view('livewire.home.single-artisan',['user' => $user, 'myReview' => $myReview, 'similarArtisans' => $similarArtisans])->layout('components.home.home-master');
    }
}
