<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\State;
use App\Models\Service;
use Livewire\Component;
use App\Models\SubService;
use Livewire\WithPagination;
use App\Models\LGA;

class Listing extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $keywords;
    public $state;
    public $lga = [];
    protected $queryString = ['keywords', 'state'];

    public function updatingKeywords()
    {
        $this->resetPage();
    }
    public function updatedState($stateId)
    {
        $this->lgas = LGA::where('state_id', $stateId)->get(); // Get LGAs based on the selected state
        $this->lga = null; // Reset the LGA selection
    }

    public function render()
    {
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
        ->latest()
        ->paginate(10);
        $states = State::all();
        $services = Service::all();
        $subservices = SubService::all();
        $lga = LGA::all();
        return view('livewire.home.listing', ['states' => $states, 'users' => $users, 'services' => $services, 'subservices' => $subservices, 'lgas' => $lga])->layout('components.home.home-master');

    }
}
