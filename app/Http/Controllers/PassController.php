<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use App\Models\Tractor;
use App\Models\Trailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassController extends Controller
{
    public function index()
    {

        return view('passes.index');
    }

    public function create()
    {
        $tractors = Tractor::where('status', 'entrance')->get();
        $trailers = Trailer::where('status', 'entrance')->get();

        return view('passes.create', compact('tractors', 'trailers'));

    }

    public function store(Request $request)
    {
        $trailer = Trailer::find($request->trailer_id);
        $tractor = Tractor::find($request->tractor_id);




        if ($request->has('tractor_id')) {
            $tractor->update([
                'status' => 'pass'
            ]);
        }

        if ($request->trailer == 'yes') {

            if ($request->has('trailer_id')) {
                $trailer->update([
                    'status' => 'pass'
                ]);
            }
        }




        $pass = Pass::create($request->all());
        $pass->status = 'pending';
        $pass->user_id = Auth::user()->id;
        $pass->save();

        return back();

    }
}
