<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    
    public function 

    public function allCat(){
        // $categories =DB::table('categories')
        // ->join('users','categories.user_id','users.id')
        // ->select('categories.*','users.name')
        // ->latest()->paginate(5);
        // Query Builder
        // $categories= DB::table('categories')->latest()->paginate(5);
        
        //Eloquent ORM
        $categories= Category::latest()->paginate(5);
        $trachCat = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('categories','trachCat'));
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
        'user_id'=>Auth::user()->id,
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

    public function edit($id){
        //Eloquent ORM
        // $categories = Category::find($id);

        //Query
        $categories = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));

    }

    public function update(Request $request ,$id){
        //Eloquent ORM
        // $update = Category::find($id)->update([
        //     'category' => $request->category,
        //     'user_id'=>\Auth::user()->id
        // ]);

        // query
        $data = array();
        $data['category']= $request->category;
        $data['user_id']=Auth::user()->id;
        Db::table('categories')->where('id',$id)->update($data);
        return Redirect()->route('all.category')->with('success','Data Updated Successfully');
    }
    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Soft Deleted Successfully');
    }

    public function Restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restored Successfully');

    }
    public function P_Delete($id){
        $p_delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Deleted Successfully');

    }
}
