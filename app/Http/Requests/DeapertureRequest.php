<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeapertureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->trailer == 'no') {
            return [
                'number_tractor'        => 'required|exists:tractors,number',
                'license_plate_tractor' => 'required|exists:tractors,license_plate',
                'driver'                => 'required|exists:passes,driver'
            ];
        } elseif ($this->trailer == 'yes' && $this->empty == 'no') {
            return [
                'number_tractor'        => 'required|exists:tractors,number',
                'license_plate_tractor' => 'required|exists:tractors,license_plate',
                'driver'                => 'required',
                'number_trailer'        => 'required|exists:trailers,number',
                'license_plate_trailer' => 'required|exists:trailers,license_plate',
                'empty'                 => 'required',
                'seal_number'           => 'required|exists:accesses,seal_number'
            ];
        } elseif ($this->trailer == 'yes') {
            return [
                'number_tractor'        => 'required|exists:tractors,number',
                'license_plate_tractor' => 'required|exists:tractors,license_plate',
                'driver'                => 'required',
                'number_trailer'        => 'required|exists:trailers,number',
                'license_plate_trailer' => 'required|exists:trailers,license_plate',
                'empty'                 => 'required'
            ];
        }
    }
}
