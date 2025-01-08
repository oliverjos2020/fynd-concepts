<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\State;
use App\Models\Service;
use Livewire\Component;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $keywords;
    public $state;

    public function search()
    {
        return redirect()->route('listing', [
            'keywords' => $this->keywords,
            'state' => $this->state,
        ]);
    }
    public function addFavorite($id, $status)
    {
        // dd($id);
        try{
            if(auth()->check()){
                if($status == 0)
                {
                    Favorite::create([
                        'user_id' => auth()->user()->id,
                        'artisan_id' => $id
                    ]);
                    $this->emit('updateFavoriteCount');
                    $this->dispatchBrowserEvent('notify', [
                        'type' => 'success',
                        'message' => 'Artisan Added to favorite',
                    ]);
                }
                else if($status == 1)
                {
                    Favorite::where('user_id', auth()->user()->id)->where('artisan_id', $id)->delete();
                    $this->emit('updateFavoriteCount');
                    $this->dispatchBrowserEvent('notify', [
                        'type' =>'error',
                        'message' => 'Artisan Removed from favorite',
                    ]);
                }

            }else{
                $this->dispatchBrowserEvent('notify', [
                    'type' => 'error',
                    'message' => 'You need to login to add to favorite',
                ]);
            }

        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors(),
                'responseCode' => 422,
            ], 422);
        }

    }
    public function render()
    {
        // $users = User::where('role_id', 2)->where('is_profile_complete', 1)->limit(6)->get();
        $loggedInUserId = Auth::id();

        $artisans = User::where('role_id', 2)
            ->where('is_profile_complete', 1)->where('status', 1)
            ->with(['favorites' => function ($query) use ($loggedInUserId) {
                if ($loggedInUserId) {
                    $query->where('user_id', $loggedInUserId);
                }
            }])
            ->limit(6)
            ->get();

        // Add `is_favorite` flag only if the user is logged in
        $artisans->each(function ($artisan) use ($loggedInUserId) {
            $artisan->is_favorite = $loggedInUserId && $artisan->favorites->isNotEmpty();
        });

        // dd($artisans);
        $states = State::all();
        $services = Service::limit(3)->get();
        return view('livewire.home.index', ['states' => $states, 'users' => $artisans, 'services' => $services])->layout('components.home.home-master');
    }
}
