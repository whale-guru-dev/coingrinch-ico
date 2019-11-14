<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'trx';
    public $timestamps = false;

    public function user()
    {
    	return $this->hasOne('App\Models\User','id');
    }
}
