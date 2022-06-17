<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function isExists($id)
    {

        $company =  Company::where('id', $id)->exists();

        return $company;
    }

    public function tractors()
    {
       return $this->hasOne(Tractor::class);
    }

    public function trailers()
    {
        return  $this->hasOne(Trailers::class);
    }
}
