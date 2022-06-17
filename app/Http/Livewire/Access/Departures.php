<?php

namespace App\Http\Livewire\Access;

use App\Models\Access;
use App\Models\Pass;
use App\Models\Tractor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Departures extends Component
{
    public $passes, $pass, $number_tractor, $license_plate_tractor,$number_trailer;
    public $open = false;
    public $trailer = 'no';

    protected $rules = [

        'number_trailer'  => 'required',

    ];


    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);

        $this->validateOnly($propertyName, [

            'license_plate_tractor' => 'required',
            'number_tractor'        => 'required|exists:tractors,number'

        ]);

        if ($this->trailer == 'yes') {
            $this->open = true;
        } else {
            $this->open = false;
        }
    }

    public function save()
    {

        $tractorExist = Tractor::isExists($this->number_tractor);
        if ($this->trailer == 'no') {

            $this->validate();

            if ($tractorExist) {

                $tractor = Tractor::where('number', $this->number_tractor)->first();
                $this->pass = Pass::where('tractor_id', $tractor->id)->first();

                if ($this->license_plate_tractor <> $tractor->license_plate) {
                    session()->flash('status', 'El numero de Placa no coincide con el Tractor');
                }
            } elseif (!$tractorExist) {

                session()->flash('status', 'El Tractor no existe');
            }


            $access = Access::create([
                'company_id'    =>  $tractor->company_id,
                'driver'        =>  $this->pass->driver,
                'tractor_id'    =>  $tractor->id,
                'empty'         =>  'yes',
                'user_id'       =>  Auth::user()->id,
                'status'        =>  'departure'
            ]);

            $access->save();

            $tractor->update([
                'status'    =>  'departure'
            ]);

            $this->pass->update([
                'access_id' =>  $access->id,
                'status'    =>  'success'
            ]);
        } elseif ($this->trailer == 'yes') {

            $this->validate();

            if ($tractorExist) {

                $tractor = Tractor::where('number', $this->number_tractor)->first();
                $trailer = Tractor::where('number', $this->number_trailer)->first();
                $this->pass = Pass::where('tractor_id', $tractor->id)->first();

                if ($this->license_plate_tractor <> $tractor->license_plate) {
                    session()->flash('status', 'El numero de Placa no coincide con el Tractor');
                }
            } elseif (!$tractorExist) {

                session()->flash('status', 'El Tractor no existe');
            }


            $access = Access::create([
                'company_id'    =>  $tractor->company_id,
                'driver'        =>  $this->pass->driver,
                'tractor_id'    =>  $tractor->id,
                'trailer_id'    =>  $trailer->id,
                'empty'         =>  'yes',
                'user_id'       =>  Auth::user()->id,
                'status'        =>  'departure'
            ]);

            $access->save();

            $tractor->update([
                'status'    =>  'departure'
            ]);

            $this->pass->update([
                'access_id' =>  $access->id,
                'status'    =>  'success'
            ]);
        }
    }

    public function render()
    {

        $tractorExist = Tractor::isExists($this->number_tractor);

        if ($tractorExist) {

            $tractor = Tractor::where('number', $this->number_tractor)->first();
            $this->pass = Pass::where('tractor_id', $tractor->id)->first();

            if (!$this->pass) {
                session()->flash('status', 'No se encontro pase de salida con ese numero de Tracotr');

                $this->reset('pass');
            }
        } else {
            $this->reset('pass');
        }





        return view('livewire.access.departures');
    }
}
