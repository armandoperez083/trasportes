<?php

namespace App\Http\Livewire\Passes;

use App\Models\Pass;
use Livewire\Component;

class IndexList extends Component
{
    public $passes,$search;

    public function render()
    {
        $this->passes = Pass::orderBy('id', 'desc')
            ->get();

        return view('livewire.passes.index-list');
    }
}
