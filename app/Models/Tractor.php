<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'license_plate',
        'company_id',
        'status'
    ];

    public static function isExists($number){

        $tractorExists =  Tractor::where('number', $number)
                        ->exists();

        if ($tractorExists) {

            $tractor = Tractor::where('number', $number)->first()->id;

            return $tractor;

        } else {
            return  $tractorExists;
        }



     }

     public function company()
     {
        return $this->belongsTo(Company::class);
     }
     public function pass()
     {
        return $this->hasOne(Pass::class);
     }

     public function access()
     {
        return $this->hasOne(Access::class);
     }


}
