<?php

namespace App\Http\Livewire\Access\Departures;

use App\Models\Pass;
use App\Models\Access;
use App\Models\Tractor;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TractorTraila extends Component
{
    public $passes, $pass, $number_tractor, $license_plate_tractor, $number_trailer, $seal_number, $license_plate_trailer;
    public $open = false;
    public $empty = 'yes';

    protected $rules = [

        'number_trailer'  => 'required',
        'number_tractor'  => 'required',
        'license_plate_tractor' => 'required',
        'license_plate_trailer' => 'required'

    ];


    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);



        $this->validateOnly($propertyName, [

            'seal_number' =>  'required',
            'number_trailer'  => 'required',
            'license_plate_trailer' => 'required'


        ]);
    }

    public function save()
    {

        $tractorExist = Tractor::isExists($this->number_tractor);

        $passExist = Pass::isExists($tractorExist);

        $this->validate();

        if ($passExist) {

            if (!$this->pass->trailer) {
                return back()->with('status', 'El pase generado para esta solicutud solo es para salida de Tractor, favor de validar con su Administrador !!!');


            } elseif ($this->pass->tractor->license_plate == $this->license_plate_tractor) {

                if ($this->pass->trailer->number == $this->number_trailer) {

                    if ($this->pass->trailer->license_plate == $this->license_plate_trailer) {

                        if ($this->pass->empty == 'yes' && $this->empty == 'no') {

                            return back()->with('status', 'El pase de salida de la traila con numero  ' . $this->number_trailer . ' esta registrda como vacia, favor de validar o contacte a su Administrador!!!');
                        } elseif ($this->pass->empty == 'no' && $this->empty == 'yes') {
                            return back()->with('status', 'El pase de salida de la traila con numero  ' . $this->number_trailer . ' esta registrda como llena, favor de sellecionar la opcion correcta!!!');
                        } elseif ($this->pass->empty == 'yes' && $this->empty == 'yes') {

                            $access = Access::create([
                                'company_id'    =>  $this->pass->tractor->company_id,
                                'driver'        =>  $this->pass->driver,
                                'tractor_id'    =>  $this->pass->tractor->id,
                                'trailer_id'    =>  $this->pass->trailer->id,
                                'empty'         =>  $this->pass->empty,
                                'user_id'       =>  Auth::user()->id,
                                'status'        =>  'departure'
                            ]);

                            $access->save();

                            $this->pass->tractor->update([
                                'status'    =>  'departure'
                            ]);

                            $this->pass->trailer->update([
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
                                'number_trailer',
                                'seal_number',
                                'license_plate_trailer',
                                'empty'
                            ]);
                        } elseif ($this->pass->empty == 'no' && $this->empty == 'no') {


                            if ($this->seal_number == '') {
                                return back()->with('status', 'El campo sellos se encuentra vacio!!!');

                            } elseif ($this->seal_number == $this->pass->seal_number) {

                                $access = Access::create([
                                'company_id'    =>  $this->pass->tractor->company_id,
                                'driver'        =>  $this->pass->driver,
                                'tractor_id'    =>  $this->pass->tractor->id,
                                'trailer_id'    =>  $this->pass->trailer->id,
                                'empty'         =>  $this->pass->empty,
                                'seal_number'   =>  $this->pass->seal_number,
                                'user_id'       =>  Auth::user()->id,
                                'status'        =>  'departure'
                            ]);

                            $access->save();

                            $this->pass->tractor->update([
                                'status'    =>  'departure'
                            ]);

                            $this->pass->trailer->update([
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
                                'number_trailer',
                                'seal_number',
                                'license_plate_trailer',
                                'empty'
                            ]);
                            } else {
                                return back()->with('status', 'El numero de sello del trailer  ' . $this->number_trailer . ' no coinciden favor de validar o contacte a su Administrador!!!');

                            }
                        }
                    } else {
                        return back()->with('status', 'El numero de placa  ' . $this->number_trailer . ' del trailer no coinciden favor de validar o contacte a su Administrador!!!');
                    }
                } else {
                    return back()->with('status', 'El numero traila de ' . $this->number_trailer . ' no coinciden favor de validar o contacte a su Administrador!!!');
                }
            } else {
                return back()->with('status', 'El numero de placa  ' . $this->number_tractor . ' no coinciden favor de validar o contacte a su Administrador!!!');
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

        return view('livewire.access.departures.tractor-traila');
    }
}
