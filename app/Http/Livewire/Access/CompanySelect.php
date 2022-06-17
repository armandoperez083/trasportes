<?php

namespace App\Http\Livewire\Access;

use App\Models\Company;
use Livewire\Component;

class CompanySelect extends Component
{
    public $companies,$name;
    public $open = false;


    public function hydrate()
    {
        $this->emit('select2');
    }


    public function save()
    {
        Company::create([

            'name' => $this->name,
        ]);

        $this->reset(['open','name']);


    }


    public function render()
    {
        $this->companies = Company::orderBy('id', 'desc')->get();

        return view('livewire.access.company-select');
    }
}
