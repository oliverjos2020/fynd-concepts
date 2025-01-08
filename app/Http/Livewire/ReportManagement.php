<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ReportArtisan;

class ReportManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $limit = '10';

    protected $queryString = ['limit'];


    public function updatingLimit()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        try{
            ReportArtisan::findOrfail($id)->delete();
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
        $reports = ReportArtisan::latest()->paginate($this->limit);
        return view('livewire.report-management', ['reports' => $reports])->layout('components.dashboard.dashboard-master');
    }
}
