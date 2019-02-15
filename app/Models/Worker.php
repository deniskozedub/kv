<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table = 'workers';
    protected $fillable = [
        'name', 'surname', 'phone', 'email', 'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Compamy::class);
    }
}
