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
    public $service;
    public $subservice;
    public $lga = [];
    protected $queryString = ['keywords', 'state', 'lga', 'service', 'subservice'];

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
        })
        ->latest()
        ->paginate(10);
        $states = State::all();
        $services = Service::all();
        $subservices = SubService::all();
        $lgas = LGA::all();
        return view('livewire.home.listing', ['states' => $states, 'users' => $users, 'services' => $services, 'subservices' => $subservices, 'lgas' => $lgas])->layout('components.home.home-master');

    }
}
