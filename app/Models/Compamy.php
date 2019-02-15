<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compamy extends Model
{
    protected $table = 'compamies';
    protected $fillable = [
        'name', 'email' , 'logo', 'link'
    ];

}
