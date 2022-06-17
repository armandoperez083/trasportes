<?php

namespace App\Http\Livewire\Trailers;

use App\Models\Trailer;
use Livewire\Component;

class Index extends Component
{

    public $trailers,$search;

    public function render()
    {
        $this->trailers = Trailer::where('number', 'like', '%'.  $this->search . '%')
                                ->orwhere('license_plate', 'like', '%'.  $this->search . '%')
                                ->orderBy('id', 'desc')
                                ->get();

        return view('livewire.trailers.index');
    }
}
