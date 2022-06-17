<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver',
        'tractor_id',
        'trailer_id',
        'empty',
        'seal_number',
        'user_id',
        'access_id',
        'status'
    ];

    public function trailer()
     {
        return $this->belongsTo(Trailer::class);
     }
     public function tractor()
     {
        return $this->belongsTo(Tractor::class);
     }

     public static function isExists($number){

        $pass =  Pass::where('tractor_id', $number)
                    ->where('status', 'pending')
                    ->exists();

           return  $pass;
     }

     public function user()
     {
        return $this->belongsTo(User::class);
     }


     public function access()
     {
        return $this->belongsTo(Access::class);
     }




}
