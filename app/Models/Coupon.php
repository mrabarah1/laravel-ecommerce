<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'discount', 'valid_until'];

    /**
     * This function will convert the coupon name to Uppercase
     */
    public function setNameAttribute($value)
    {
       return  $this->attributes['name'] = Str::upper($value);
    }

    /**
    * To check if coupon is valid
    */
    public function checkIfValid()
    {
        if($this->valid_until > Carbon::now()) {
            return true;
        }else {
            return false;
        }
    }
}
