<?php

namespace App\Http\Livewire\Access;

use App\Models\Access;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $acceses = Access::all();


        return view('livewire.access.index', compact('acceses'));
    }
}

