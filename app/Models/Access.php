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
}
