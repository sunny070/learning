<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function allCat(){
        $categories= Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function addCat(Request $request){
        $validate=$request->validate([
            'category'=>'required|unique:categories|max:50',
        ],
        [
            'category.required'=>'Please Enter the Category Name',
        ]
    
    );
    // One way to save data to database
    Category::insert([
        'category'=>$request->category,
        'user_id'=>\Auth::user()->id,
        'created_at' => Carbon::now()
    ]);
    return Redirect()->back()->with('success','Data Inserted Successfully');

    // normal way to save data to the data base
    // $category = new Category;
    // $category->category = $request->category;
    // $category->user_id = \Auth::user()->id;
    // $category->save();
    // return back();

    // insert data useing query builder
    //     $data=array();
    //     $data['category']= $request->category;
    //     $data['user_id'] = \Auth::user()->id;
    //     \DB::table('categories')->insert($data);
    // return Redirect()->back()->with('success','Data Inserted Successfully');


    }
    // public function show(){
    //     $data= Category::all();
    //     return view('admin.category.index',compact('data'));

    // }

    public function add()
    {
        
        return view('admin.category.add');
    }
}
