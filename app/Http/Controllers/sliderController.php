<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\slider;
use App\Http\Controllers\productsController;
use Illuminate\Http\Request;
use DB;
class sliderController extends Controller
{
    //display 
    function index(){
        $sliders = slider::all();
        return view('home', compact('sliders',$sliders));
    }

    function sliderIndex(){
        $sliders = slider::all();
        return view('slider/index', compact('sliders',$sliders));    
    }

    function create()
    {
        return view('slider/createSlider');        
    }

    function store(Request $request)
    {
        $slider = new slider;
        $slider->description = $request->input('description');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/slider/' , $filename);
            $slider->image = $filename;
        }

        $slider->save();
        return redirect('add-slider')->with('status' , 'slider add successfuly');        
    }

    function destroy($id) {
        DB::delete('delete from slider where id = ?',[$id]);
        return redirect()->back()->with('status' , 'slider add successfuly');
    }
    //display befor editeing   
    function show($id) {
        $sliders = DB::select('select * from slider where id = ?',[$id]);
        return view('slider/sliderUpdate', ['slidres' => $sliders] );
    }
    //save edites
    function edit(Request $request,$id) {
        $description= $request->input('description');
        $category_id = $request->input('slider_id');
        DB::update('update slider set description = ?  where id = ?',[$description,$id]);
        return redirect()->back()->with('status' , 'slider edited successfuly');
    }
}



