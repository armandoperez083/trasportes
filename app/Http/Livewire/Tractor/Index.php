<?php

namespace App\Http\Livewire\Tractor;

use App\Models\Tractor;
use Livewire\Component;

class Index extends Component
{
    public $tractors,$search;

    public function render()
    {
        $this->tractors = Tractor::where('number', 'like', '%' .  $this->search . '%')
            ->orwhere('license_plate', 'like', '%' .  $this->search . '%')
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.tractor.index');
    }
}
