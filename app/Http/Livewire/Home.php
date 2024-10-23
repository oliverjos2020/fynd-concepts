<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $step = 1;

    public function next()
    {
        $this->step = $this->step + 1;
        // dd($this->step);
    }
    public function previous()
    {
        $this->step - 1;
    }
    public function render()
    {
        return view('livewire.home.home')->layout('components.dashboard.dashboard-artisan');
    }
}
