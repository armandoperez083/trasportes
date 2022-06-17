<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'driver',
        'tractor_id',
        'trailer_id',
        'empty',
        'seal_number',
        'user_id',
        'status'

    ];


    public static function sealExists($number){

       $seal = Access::where('seal_number', $number)->exists();

        return $seal;
     }

     public function tractor()
     {
        return $this->belongsTo(Tractor::class);
     }

     public function trailer()
     {
        return $this->belongsTo(Trailer::class);
     }

     public function company()
     {
        return $this->belongsTo(Company::class);
     }

     public function user()
     {
        return $this->belongsTo(User::class);
     }

     public function pass()
     {
        return $this->hasOne(Pass::class);
     }
}
