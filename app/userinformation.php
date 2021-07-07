<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userinformation extends Model
{
       protected $fillable = [
        'user_id', 'address', 'phone'
    ];


    public function User(){
    	return $this->hasOne('App\User','id','user_id');
    }

}
