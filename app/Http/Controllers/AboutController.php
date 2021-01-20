<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::latest()->get();

        return view("admin.about.index", compact('about'));
    }

    public function about()
    {
        return view('admin.about.create');
    }

public function upload(Request $request)
{
    About::insert([
        'title' => $request->title,
        'short_description' => $request->short_description,
        'long_description' => $request->long_description,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('home.about')->with('success', 'Slider Inserted Succesfully');

    return $request->all();
}


}
