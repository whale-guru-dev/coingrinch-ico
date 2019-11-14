<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logins extends Model
{
    //
    protected $fillable = [
        'usid','ip', 'location', 'ua','tm'
    ];
}
