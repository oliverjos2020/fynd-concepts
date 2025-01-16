<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TermsCondition extends Component
{
    public function render()
    {
        return view('livewire.home.terms-condition')->layout('components.home.home-master');
        // return view('livewire.terms-condition');
    }
}
