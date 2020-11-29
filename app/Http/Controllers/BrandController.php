<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\MultipleImage;
use Illuminate\Support\Carbon;
use Image;


class BrandController extends Controller
{
    //
public function AllBrand()
{
    # code...
    
$brands = Brand::latest()->paginate(5);


return view('admin.brand.index',compact('brands'));
}

public function storeBrand(Request $request)
{
    $validatedData=  $request->validate([
        'brand_name' => 'required|unique:brands|min:4|max:25',
        'brand_image' => 'required| mimes:jpg,jpeg,png',
       
    ],
[
    'brand_name.required'=>"brand name to dalo bhaii",
    'brand_image.required'=>"image to dalo bhaii bon"
    ]
);

$brand_image= $request->file('brand_image');

// $name_gen = hexdec(uniqid());
// $img_ext =  strtolower($brand_image->getClientOriginalExtension());
// $img_name = $name_gen.'.'.$img_ext;
// $upload_location = 'image/brand/';
// $last_img =  $upload_location.$img_name;

// $brand_image->move($upload_location,$img_name);

 // -------------------------------- above code is comment because of now we useing intervation package ----------------------------------------

 $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
$last_img= 'image/brand/'.$name_gen;



Brand::insert([
    'brand_name'=>$request->brand_name,
    'brand_image'=>$last_img,
    'created_at'=>Carbon::now()
]);

return Redirect()->back()->with('success','brand inserted successfully');

}

public function edit($id)
{
    # code...
$brands = Brand::find($id);

return view('admin.brand.edit',compact('brands'));



}
public function update(Request $request , $id)
{

    $validatedData=  $request->validate([
        'brand_name' => 'required|min:4|max:25',
       
    ],
[
    'brand_name.required'=>"brand name to dalo bhaii",
    ]
);

$old_image = $request->old_image;

$brand_image= $request->file('brand_image');

//if you dont put your code in if and else condition than it show error of also validate for image and we dont uploadd image that's wht it get error of undefine of  $img_ext =  strtolower($brand_image->getClientOriginalExtension());

// so it is better to put in if else condition

if($brand_image){
    $name_gen = hexdec(uniqid());
    $img_ext =  strtolower($brand_image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $upload_location = 'image/brand/';
    $last_img =  $upload_location.$img_name;
    
    $brand_image->move($upload_location,$img_name);
    
    unlink($old_image);
    
    Brand::find($id)->update([
        'brand_name'=>$request->brand_name,
        'brand_image'=>$last_img,
        'created_at'=>Carbon::now()
    ]);
    
    return Redirect()->back()->with('success','brand inserted successfully');
}
else{
    
    Brand::find($id)->update([
        'brand_name'=>$request->brand_name,
        'created_at'=>Carbon::now()
    ]);
    
    return Redirect()->back()->with('success','brand name update successfully');

}



    # code...
}


public function Delete($id)
{
    $image = Brand::find($id);
    $old_image= $image->brand_image;
unlink($old_image);

Brand::find($id)->delete();
return Redirect()->back()->with('success','brand deleted successfully');
}


public function multiple(Request $request)
{

$images= Multipleimage::all();

    
    return view('admin.multiple.index',compact('images'));
}

public function multipleAdd(Request $request)
{
    # code...
  




$images= $request->file('multi_image');

foreach($images as $multi_image){

  
    $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
    Image::make($multi_image)->resize(300,200)->save('image/multi/'.$name_gen);
    $last_img= 'image/multi/'.$name_gen;
    
    MultipleImage::insert([
        'multi_image'=>$last_img,
      
        'created_at'=>Carbon::now()
    ]);

}
return Redirect()->back()->with('success','brand inserted successfully');

}
}
