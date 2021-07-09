<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'code',
        'price',
        'category_id',
        'image',
    ];

    public function categoriese()
    {
        return $this->hasMany('App\categoriese');
    }

    public function likes(){
        return $this->hasMany('App/like');
    }

    public function orders(){
        return $this->hasMany('App/order');
    }

    public function reviews(){
        return $this->hasMany('App/review');
    }

    public function carts(){
        return $this->hasMany('App/cart');
    }





}
