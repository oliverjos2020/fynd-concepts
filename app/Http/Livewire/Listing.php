<?php

namespace App\Http\Livewire;

use App\Models\LGA;
use App\Models\User;
use App\Models\State;
use App\Models\Service;
use Livewire\Component;
use App\Models\Favorite;
use App\Models\SubService;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Listing extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $keywords;
    public $state;
    public $service;
    public $subservice;
    public $lga = [];
    protected $queryString = ['keywords', 'state', 'lga', 'service', 'subservice'];
    protected $listeners = ['updateFavoriteCount'];

    public function updatingKeywords()
    {
        $this->resetPage();
    }
    public function updatedState($stateId)
    {
        $getStateId = State::where('slug', $stateId)->first();
        $this->lgas = LGA::where('state_id', $getStateId->id)->get(); // Get LGAs based on the selected state
        $this->lga = null; // Reset the LGA selection
    }

    public function updatedLga()
    {
        $this->resetPage();
    }
    public function updatedService($serviceId)
    {
        $getServiceId = Service::where('slug', $serviceId)->first();
        $this->subservices = SubService::where('service_id', $getServiceId->id)->get(); // Get LGAs based on the selected state
        $this->subservice = null; // Reset the LGA selection
    }

    public function addFavorite($id, $status)
    {
        try {
            if (!auth()->check()) {
                return $this->dispatchBrowserEvent('notify', [
                    'type' => 'error',
                    'message' => 'You need to login to add to favorite',
                ]);
            }

            $userId = auth()->id(); // Get once and reuse

            if ($status == 0) {
                // Check for existing favorite to prevent duplicates
                $exists = Favorite::where('user_id', $userId)
                    ->where('artisan_id', $id)
                    ->exists();

                if (!$exists) {
                    Favorite::create([
                        'user_id' => $userId,
                        'artisan_id' => $id
                    ]);
                }

                $type = 'success';
                $message = 'Artisan Added to favorite';
            } else if ($status == 1) {
                Favorite::where('user_id', $userId)
                    ->where('artisan_id', $id)
                    ->delete();

                $type = 'error';
                $message = 'Artisan Removed from favorite';
            }

            $this->emitTo('header-component', 'refreshFavoriteCount');
            $this->dispatchBrowserEvent('notify', [
                'type' => $type,
                'message' => $message,
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'responseMessage' => $e->errors(),
                'responseCode' => 422,
            ], 422);
        } catch (\Exception $e) {
            return $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => 'An error occurred while processing your request',
            ]);
        }
    }


    public function updatedSubservice()
    {
        $this->resetPage();
    }

    public function resetFilter()
    {
        $this->reset(['keywords', 'state', 'lga', 'service', 'subservice']);
    }

    public function render()
    {
        $loggedInUserId = Auth::id();
        $users = User::query()
        ->where('role_id', 2)
        ->where('is_profile_complete', 1)
        ->when($this->keywords, function ($query) {
            $query->whereHas('service', function ($serviceQuery) {
                $serviceQuery->where('service', 'like', '%' . $this->keywords . '%');
            });
        })
        ->when($this->state, function ($query) {
            $query->whereHas('state', function ($stateQuery) {
                $stateQuery->where('name', $this->state);
            });
        })
        ->when($this->lga, function ($query) {
            $query->whereHas('lga', function ($lgaQuery) {
                $lgaQuery->where('slug', $this->lga);
            });
        })
        ->when($this->service, function ($query) {
            $query->whereHas('service', function ($serviceQuery) {
                $serviceQuery->where('slug', $this->service);
            });
        })
        ->when($this->subservice, function ($query) {
            $query->whereHas('subservice', function ($serviceQuery) {
                $serviceQuery->where('slug', $this->subservice);
            });
        })->with(['favorites' => function ($query) use ($loggedInUserId) {
            if ($loggedInUserId) {
                $query->where('user_id', $loggedInUserId);
            }
        }])
        ->latest()
        ->paginate(10);
        $users->each(function ($user) use ($loggedInUserId) {
            $user->is_favorite = $loggedInUserId && $user->favorites->isNotEmpty();
        });
        $states = State::all();
        $services = Service::all();
        $subservices = SubService::all();
        $lgas = LGA::all();
        return view('livewire.home.listing', ['states' => $states, 'users' => $users, 'services' => $services, 'subservices' => $subservices, 'lgas' => $lgas])->layout('components.home.home-master');

    }
}
