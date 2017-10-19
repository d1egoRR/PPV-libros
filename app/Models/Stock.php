<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';

    public function libro()
    {
    	return $this->belongsTo("App\Models\Libro");
    }
}
