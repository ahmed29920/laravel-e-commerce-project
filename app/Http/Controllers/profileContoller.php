<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\like;
use App\Models\order;
use App\Models\review;
use Illuminate\Http\Request;

class profileContoller extends Controller
{
    //
    function index(){
        return view('profile');
    }
}
