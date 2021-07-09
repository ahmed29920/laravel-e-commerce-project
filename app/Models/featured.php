<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class featured extends Model
{
    use HasFactory;
    protected $table = 'featured';
    protected $fillable = [
        'product_id',
    ];

    public function Product(){
        return $this->belongsTo('App/Products');
    }
}
