<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class MyFavorite extends Component
{
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
        $loggedInUserId = Auth::id();
        $artisanIds = Favorite::where('user_id', auth()->user()->id)  // Assuming the current user is the one adding favorites
        ->pluck('artisan_id');  // Get an array of artisan_ids
        // dd($artisanIds);
        $favorites = User::whereIn('id', $artisanIds)->with(['favorites' => function ($query) use ($loggedInUserId) {
            if ($loggedInUserId) {
                $query->where('user_id', $loggedInUserId);
            }
        }])->get();
        $favorites->each(function ($artisan) use ($loggedInUserId) {
            $artisan->is_favorite = $loggedInUserId && $artisan->favorites->isNotEmpty();
        });
        return view('livewire.home.favorite', ['favorites' => $favorites])->layout('components.home.home-master');
    }
}
