<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\State;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class StateManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $state;
    public $editingID;
    public $editingstate;
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
            'state' => ['required', 'unique:states,name', 'min:2', 'max:50']
        ]);
        try{
        State::create([
            'name' => $this->state,
            'slug'=>Str::of(Str::lower($this->state))->slug('-')
        ]);
        $this->reset(['state']);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'State Created Successfully',
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
        $this->editingstate = State::find($id)->name;
    }

    public function update()
    {
        try {
            $this->validateOnly('editingstate', ['editingstate' => 'required']);
            State::find($this->editingID)->update([
                'name' => $this->editingstate,
                'slug' => Str::slug($this->editingstate)
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
        $this->reset('editingstate', 'editingID');
    }

    public function delete($id)
    {
        try{
            State::findOrfail($id)->delete();
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
        $states = State::query()
        ->where('name', 'like', '%' . $this->search . '%')
        ->latest()
        ->paginate($this->limit);
        return view('livewire.state-management', [
            'states' => $states,
        ])->layout('components.dashboard.dashboard-master');
    }
}
