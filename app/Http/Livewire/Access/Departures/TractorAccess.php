<?php

namespace App\Http\Livewire\Access\Departures;

use App\Models\Pass;
use App\Models\Access;
use App\Models\Tractor;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TractorAccess extends Component
{

    public $pass, $number_tractor, $license_plate_tractor;
    public $empty = 'yes';

    protected $rules = [

        'number_tractor'  => 'required',
        'license_plate_tractor' => 'required',

    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }


    public function save()
    {

        $tractorExist = Tractor::isExists($this->number_tractor);
        $passExist = Pass::isExists($tractorExist);

        $this->validate();


        if ($passExist) {

            if ($this->pass->tractor->license_plate == $this->license_plate_tractor) {

                $access = Access::create([
                    'company_id'    =>  $this->pass->tractor->company_id,
                    'driver'        =>  $this->pass->driver,
                    'tractor_id'    =>  $this->pass->tractor->id,
                    'empty'         =>  $this->pass->empty,
                    'user_id'       =>  Auth::user()->id,
                    'status'        =>  'departure'
                ]);

                $access->save();

                $this->pass->tractor->update([
                    'status'    =>  'departure'
                ]);

                $this->pass->update([
                    'access_id' =>  $access->id,
                    'status'    =>  'success'
                ]);

                $this->reset([
                    'pass',
                    'number_tractor',
                    'license_plate_tractor',
                    'empty'
                ]);
            }
        } else {
            return back()->with('status', 'No se contro pase de salida registrado con el numero de tractor ' . $this->number_tractor . ' favor de validar o contacte a su Administrador!!!');

        }



    }

    public function render()
    {

        $tractorExist = Tractor::isExists($this->number_tractor);

        if ($tractorExist) {

            $tractor = Tractor::where('number', $this->number_tractor)->first();
            $this->pass = Pass::where('tractor_id', $tractor->id)->first();
        } else {
            $this->reset('pass');
        }

        return view('livewire.access.departures.tractor-access');
    }
}
