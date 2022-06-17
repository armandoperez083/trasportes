<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'license_plate',
        'company_id',
        'status'
    ];

    public static function isExists($number){

        $trailer =  Trailer::where('number', $number)
                        ->exists();

        return $trailer;

     }

     public function company()
     {
        return $this->belongsTo(Company::class);
     }
     public function pass()
     {
        return $this->hasOne(Pass::class);
     }
}
