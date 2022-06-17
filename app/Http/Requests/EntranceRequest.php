<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntranceRequest extends FormRequest
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
                'company_id'            => 'required',
                'number_tractor'        => 'required|unique:tractors,number',
                'license_plate_tractor' => 'required|unique:tractors,license_plate',
                'driver'                => 'required'
            ];
        } elseif ($this->trailer == 'yes' && $this->empty == 'no') {
            return [
                'company_id'            => 'required',
                'number_tractor'        => 'required|unique:tractors,number',
                'license_plate_tractor' => 'required|unique:tractors,license_plate',
                'driver'                => 'required',
                'number_trailer'        => 'required|unique:trailers,number',
                'license_plate_trailer' => 'required|unique:trailers,license_plate',
                'empty'                 => 'required',
                'seal_number'           => 'required'
            ];
        } elseif ($this->trailer == 'yes') {
            return [
                'company_id'            => 'required',
                'number_tractor'        => 'required|unique:tractors,number',
                'license_plate_tractor' => 'required|unique:tractors,license_plate',
                'driver'                => 'required',
                'number_trailer'        => 'required|unique:trailers,number',
                'license_plate_trailer' => 'required|unique:trailers,license_plate',
                'empty'                 => 'required'
            ];
        }
    }
}
