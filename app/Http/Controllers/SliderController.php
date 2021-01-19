<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Redirect;
use Image;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function index()
    {

        $sliders =  Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function addslider()
    {
        return view('admin.slider.create');
    }


    public function uploadslider(Request $request)
    {
        $slider_image = $request->file('sliderfile');
        $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();

        Image::make($slider_image)->resize(1920, 1080)->save('image/slider/' . $name_gen);

        $last_img = 'image/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.slider')->with('success', 'Slider Inserted Succesfully');


        # code...
    }
}
