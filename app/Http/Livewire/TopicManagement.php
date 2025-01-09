<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Topic;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Exception;

class TopicManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $topic;
    public $editingTopic;
    public $editingID;
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

    public function createTopic()
    {
        $validated = $this->validate([
            'topic' => ['required', 'unique:topics,topic', 'min:2', 'max:50']
        ]);
        try{
            Topic::create([
            'topic' => $this->topic,
            'slug'=>Str::of(Str::lower($this->topic))->slug('-')
        ]);
        $this->reset(['topic']);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Topic Created Successfully',
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
        $this->editingTopic = Topic::find($id)->topic;
    }

    public function cancelEdit()
    {
        $this->reset('editingID', 'editingTopic');
    }

    public function update()
    {
        try {
            $this->validateOnly('editingTopic', ['editingTopic' => 'required']);
            Topic::find($this->editingID)->update([
                'topic' => $this->editingTopic,
                'slug' => Str::slug($this->editingTopic)
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
            Topic::findOrfail($id)->delete();
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
        $topics = Topic::query()->where('topic', 'like', '%' . $this->search . '%')->latest()->paginate($this->limit);

        return view('livewire.topic-management', [
            'topics' => $topics,
        ])->layout('components.dashboard.dashboard-master');;
    }
}
