<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class SubServiceManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $limit = '10';
    public $service;
    public $subservice;

    public $editingID;
    public $editingservice;
    public $editingsubservice;


    protected $queryString = ['limit', 'search'];

     public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingLimit()
    {
        $this->resetPage();
    }

    public function createSubService()
    {
        $this->validate([
            'service' => ['required'],
            'subservice' => ['required', 'unique:sub_services,subservice', 'min:2', 'max:50']
        ]);
        try{
            SubService::create([
            'service_id' => $this->service,
            'subservice' => $this->subservice,
            'slug'=>Str::of(Str::lower($this->subservice))->slug('-')
        ]);
        $this->reset(['service', 'subservice']);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Service Created Successfully',
        ]);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
            return;
        }
    }

    public function edit($id)
    {
        $this->editingID = $id;
        $this->editingservice = SubService::find($id)->service_id;
        $this->editingsubservice= SubService::find($id)->subservice;
    }

    public function cancelEdit()
    {
        $this->reset('editingID', 'editingservice', 'editingsubservice');
    }

    public function update()
    {
        // try {
            $this->validate([
                'editingservice' => ['required'],
                'editingsubservice' => ['required']
            ]);
            // dd($this->editingsubservice);
            SubService::find($this->editingID)->update([
                'service_id' => $this->editingservice,
                'subservice' => $this->editingsubservice,
                'slug'=>Str::of(Str::lower($this->editingsubservice))->slug('-')
            ]);
            $this->cancelEdit();
        // }catch(Exception $e){
        //     $this->dispatchBrowserEvent('notify', [
        //         'type' => 'error',
        //         'message' => $e->getMessage(),
        //     ]);
        //     return;
        // }
    }

    public function delete($id)
    {
        try{
            SubService::findOrfail($id)->delete();
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => 'Deleted Successfully',
            ]);

        } catch (Exception $e) {
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
            return;
        }

    }

    public function render()
    {
        // \DB::enableQueryLog();
        $services = Service::all();
        // $subservices = SubService::query()
        // ->where('subservice', 'like', '%' . $this->search . '%')
        // ->latest()
        // ->paginate($this->limit);
        $subservices = SubService::with('services') // Eager load services
        ->where('subservice', 'like', '%' . $this->search . '%')
        ->latest()
        ->paginate($this->limit);
        // dd(\DB::getQueryLog());
        return view('livewire.sub-service-management', [
            'services' => $services, 'subservices' => $subservices
        ])->layout('components.dashboard.dashboard-master');
    }
}
