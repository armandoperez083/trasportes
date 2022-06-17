<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Tractor;
use App\Models\Trailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EntranceRequest;
use App\Http\Requests\DeapertureRequest;
use App\Models\Pass;

class AccessController extends Controller
{

    public function entrances()
    {


        return view('access.entrances.index');
    }

    public function deapertures(){



        return view('access.deapertures.create');
    }

    public function deaperturesT(){



        return view('access.deapertures.tractor');
    }

    public function deaperturesTT(){



        return view('access.deapertures.tractor-trailer');
    }



    public function entStore(EntranceRequest $request)
    {
        $tractorExist = Tractor::isExists($request->number_tractor);
        $trailerExist = Trailer::isExists($request->number_trailer);

        if ($tractorExist && $trailerExist) {
            $tractor = Tractor::where('number', $request->number_tractor)->first();
            $trailer = Trailer::where('number', $request->number_trailer)->first();

            // dd("Tractor Exist && Trailer Exist");

            if ($tractor->status == 'departure' && $trailer->status == 'pass' || $tractor->status == 'departure' && $trailer->status == 'entrance') {

                return back()->with('status', 'La traila  con numero ' . $trailer->number . ' se encuentra con status ' . $trailer->status . ' posiblemente se encuentre en tramite de salida.');
            } elseif ($trailer == 'departure' && $tractor == 'pass' || $trailer == 'departure' && $tractor->status == 'entrance') {

                return back()->with('status', 'El tractor con numero ' . $tractor->number . ' se encuentra con status ' . $tractor->status . ' posiblemente se encuentre en tramite de salida.');
            } elseif ($tractor->status == 'departure' && $trailer->status == 'departure') {
                //  dd($request->seal_number);
                // dd("Tractor Exist && Trailer Exist");
                $tractor->update([
                    'status' => 'entrance'
                ]);

                $trailer->update([
                    'status' => 'entrance'
                ]);

                $access = Access::create($request->except(
                    'number_tractor',
                    'number_trailer',
                    'license_plate_tractor',
                    'license_plate_trailer',
                    'trailer'
                ));

                $access->tractor_id     = $tractor->id;
                $access->trailer_id     = $trailer->id;
                $access->user_id        = Auth::user()->id;
                $access->seal_number    = $request->seal_number;
                $access->status         = 'entrance';
                $access->save();

                return back();
            }
        } elseif ($tractorExist  && !$trailerExist) {
            // dd("Tractor Exist && Trailer Not Exist");
            $tractor = Tractor::where('number', $request->number_tractor)->first();

            if ($tractor->status != 'departure') {
                return back()->with('status', 'El tractor con numero ' . $tractor->number . ' se encuentra con status ' . $tractor->status . ' posiblemente se encuentre en tramite de salida.');
            } else {
                $tractor->update([
                    'status' => 'entrance'
                ]);

                $trailer = Trailer::create([
                    'number'            =>  $request->number_trailer,
                    'license_plate'     =>  $request->license_plate_trailer,
                    'company_id'        =>  $request->company_id,
                    'status'            =>  'entrance'

                ]);

                $access = Access::create($request->except(
                    'number_tractor',
                    'number_trailer',
                    'license_plate_tractor',
                    'license_plate_trailer',
                    'trailer'
                ));

                $access->tractor_id     = $tractor->id;
                $access->trailer_id     = $trailer->id;
                $access->user_id        = Auth::user()->id;
                $access->seal_number    = $request->seal_number;
                $access->status         = 'entrance';
                $access->save();

                return back();
            }
        } elseif (!$tractorExist && !$trailerExist) {
            // dd($request->all());

            // dd("Tractor Not Exist && Trailer Not Exist");

            if ($request->trailer == 'no') {

                $tractor = Tractor::create([
                    'number'            =>  $request->number_tractor,
                    'license_plate'     =>  $request->license_plate_tractor,
                    'company_id'        =>  $request->company_id,
                    'status'            =>  'entrance'

                ]);

                $access = Access::create($request->except(
                    'number_tractor',
                    'license_plate_tractor',
                    'trailer',
                    'empty'
                ));

                $access->tractor_id     = $tractor->id;
                $access->user_id        = Auth::user()->id;
                $access->empty          = 'yes';
                $access->status         = 'entrance';
                $access->save();

                return back();
            }

            if ($request->trailer == 'yes' && $request->empty == 'no') {

                $tractor = Tractor::create([
                    'number'            =>  $request->number_tractor,
                    'license_plate'     =>  $request->license_plate_tractor,
                    'company_id'        =>  $request->company_id,
                    'status'            =>  'entrance'

                ]);

                $trailer = Trailer::create([
                    'number'            =>  $request->number_trailer,
                    'license_plate'     =>  $request->license_plate_trailer,
                    'company_id'        =>  $request->company_id,
                    'status'            =>  'entrance'

                ]);

                $access = Access::create($request->except(
                    'number_tractor',
                    'number_trailer',
                    'license_plate_tractor',
                    'license_plate_trailer',
                    'trailer'
                ));

                $access->tractor_id     = $tractor->id;
                $access->trailer_id     = $trailer->id;
                $access->user_id        = Auth::user()->id;
                $access->seal_number    = $request->seal_number;
                $access->status         = 'entrance';
                $access->save();

                return back();
            }

            if ($request->trailer == 'yes') {

                $tractor = Tractor::create([
                    'number'            =>  $request->number_tractor,
                    'license_plate'     =>  $request->license_plate_tractor,
                    'company_id'        =>  $request->company_id,
                    'status'            =>  'entrance'

                ]);

                $trailer = Trailer::create([
                    'number'            =>  $request->number_trailer,
                    'license_plate'     =>  $request->license_plate_trailer,
                    'company_id'        =>  $request->company_id,
                    'status'            =>  'entrance'

                ]);

                $access = Access::create($request->except(
                    'number_tractor',
                    'number_trailer',
                    'license_plate_tractor',
                    'license_plate_trailer',
                    'trailer',
                    'seal_number'
                ));

                $access->tractor_id     = $tractor->id;
                $access->trailer_id     = $trailer->id;
                $access->user_id        = Auth::user()->id;
                $access->status         = 'entrance';
                $access->save();

                return back();
            }
        } elseif (!$tractorExist && $trailerExist) {
                 return back()->with('status', 'No es posible generar el acceso de entrada debido a que la traila ya se encuentra dentro del patio');

        } elseif ($tractorExist) {
            // dd("Tractor Exist ");
            $tractor = Tractor::where('number', $request->number_tractor)->first();

            if ($tractor->status != 'departure') {
                return back()->with('status', 'El tractor con numero ' . $tractor->number . ' se encuentra con status ' . $tractor->status . ' posiblemente se encuentre en tramite de salida.');
            } else {
                $tractor->update([
                    'status' => 'entrance'
                ]);

                $access = Access::create($request->except(
                    'number_tractor',
                    'license_plate_tractor',
                    'trailer'
                ));

                $access->tractor_id     = $tractor->id;
                $access->user_id        = Auth::user()->id;
                $access->status         = 'entrance';
                $access->save();

                return back();
            }
        }
    }

    public function extStore(DeapertureRequest $request)
    {

        $tractor = Tractor::where('number', $request->number_tractor)->first();

        dd($tractor->pass->driver);
        $trailer = Trailer::where('number', $request->number_trailer)->first();

        // $exitAccess = Access::create($request->all());


        return back()->with('status', 'Los datos son corecctos ahuevo ');
    }
}
