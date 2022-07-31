<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{ use HasFactory;
    protected $fillable=[
        'street_name',
        'street_number',
        'city_id',
        'state_id',
        'country_id',
        'post_code'
    ];
   

    public function usersShippingAddress(){

        return $this->hasMany(User::class,'shipping_address','id');
    }
    public function userBillingAddress(){

        return $this->hasMany(User::class,'billing_addresss','id');
    }

    
   
}
