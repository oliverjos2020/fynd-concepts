<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\State;
use App\Models\LGA;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class LGAManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $state;
    public $lga;
    public $editingID;
    public $editingstate;
    public $editinglga;
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

    public function create()
    {
        $this->validate([
            'state' => ['required'],
            'lga' => ['required']
        ]);
        try{
        LGA::create([
            'state_id' => $this->state,
            'name' => $this->lga,
            'slug'=>Str::of(Str::lower($this->lga))->slug('-')
        ]);
        $this->reset(['lga']);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'LGA Created Successfully',
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
        $this->editingstate = LGA::find($id)->state_id;
        $this->editinglga = LGA::find($id)->name;
    }

    public function update()
    {
        try {
            $this->validate([
                'editingstate' => ['required'],
                'editinglga' => ['required']
            ]);
            LGA::find($this->editingID)->update([
                'state_id' => $this->editingstate,
                'name' => $this->editinglga,
                'slug' => Str::slug($this->editinglga)
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

    public function cancelEdit()
    {
        $this->reset('editingstate', 'editingID', 'editinglga');
    }

    public function delete($id)
    {
        try{
            LGA::findOrfail($id)->delete();
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => 'Record Deleted Successfully',
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
        $states = State::all();
        $lgas = LGA::query()
        ->where('name', 'like', '%' . $this->search . '%')
        ->latest()
        ->paginate($this->limit);
        return view('livewire.l-g-a-management', [
            'lgas' => $lgas,
            'states' => $states
        ])->layout('components.dashboard.dashboard-master');
    }
}
