<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\Service;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ServiceManagement extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $service;
    public $editingID;
    public $editingservice;
    public $icon_url;
    public $editingicon_url;
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

    public function createService()
    {
        $this->validate([
            'service' => ['required', 'unique:services,service', 'min:2', 'max:50'],
            // 'icon_url' => ['required']
        ]);
        try{
        if($this->icon_url){
            $imageFile = '/storage/'.$this->icon_url->store('uploads', 'public');
        }
        Service::create([
            'service' => $this->service,
            'slug'=>Str::of(Str::lower($this->service))->slug('-'),
            'icon_url' => $imageFile ?? ''
        ]);
        $this->reset(['service', 'icon_url']);
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
        $this->editingservice = Service::find($id)->service;
        $this->editingicon_url= Service::find($id)->icon_url;
    }

    public function cancelEdit()
    {
        $this->reset('editingID', 'editingservice');
    }

    public function update()
    {
        try {
            $this->validateOnly('editingservice', ['editingservice' => 'required']);
            if($this->editingicon_url){
                $imageFile = '/storage/'.$this->editingicon_url->store('uploads', 'public');
            }
            Service::find($this->editingID)->update([
                'service' => $this->editingservice,
                'slug' => Str::slug($this->editingservice),
                'icon_url' => $imageFile ?? ''
            ]);
            $this->cancelEdit();
        }catch(Exception $e){
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
            return;

        }
    }

    public function delete($id)
    {
        try{
            Service::findOrfail($id)->delete();
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
        $services = Service::query()
        ->where('service', 'like', '%' . $this->search . '%')
        ->latest()
        ->paginate($this->limit);
        return view('livewire.service-management', [
            'services' => $services,
        ])->layout('components.dashboard.dashboard-master');
    }
}
