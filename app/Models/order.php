<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public $timestamps = false; 

    public function user(){
        return $this->belongsTo('App/user');
    }

    public function Product(){
        return $this->belongsTo('App/products');
    }
}