<?php

namespace App\Http\Livewire;

use Log;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HeaderComponent extends Component
{
    public $favoriteCount = 0;

    protected $listeners = ['refreshFavoriteCount'];

    public function mount()
    {
        $this->refreshFavoriteCount();
    }

    public function refreshFavoriteCount()
    {
        $this->favoriteCount = Auth::check() ? Auth::user()->myFavorites->count() : 0;
    }

    public function render()
    {
        return view('livewire.header-component');
    }
}

