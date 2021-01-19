<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    //
    public function AllCategory()
    {
        $categories = Category::latest()->paginate(5);  // this is by eloquent url
        $trash_cat = Category::onlyTrashed()->latest()->paginate(3);  // this is by eloquent url

        // $categories= DB::table('categories')->latest()->get();   //this is by queary builder
        // $categories= DB::table('categories')->latest()->paginate(3);   //this is by using pagignation



        return view('admin.category.index', compact('categories', 'trash_cat'));
    }


    public function AddCat(Request $request)
    {

        $validatedData =  $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',

            ],
            ['category_name.required' => "msg to dalo bhaii"]
        );


        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // $category= new Category();
        // $category->category_name=$request->category_name;
        // $category->user_id= Auth::user()->id;
        // // $category->created_at=Carbon::now();  category is not define
        // $category->save();


        // -------------------------------- bu queary builder ----------------------------------------
        // $data=array();

        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;

        // DB::table('categories')->insert($data);


        return Redirect()->back()->with('success', 'category inserted successfully');
    }


    
    public function edit($id)

    {
        $category = Category::find($id);
        // echo "this is working...";
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id

        ]);
        return Redirect()->route('all.category')->with('success', 'category updated successfully');
    }

    public function softDelete($id)
    {
        $delete = Category::find($id)->delete();
        return redirect()->back()->with('success', 'Category deleted sucessfully');

        # code...
    }
}
