<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    Public function Brand(){
        $brands=Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function StoreBrand(Request $request){
        $validateData = $request->validate([
            'brand_name'=>'required|unique:brands|min:5',
            'brand_image'=>'required|mimes:jpg,jpeg,png',

        ],
        [

            'brand_name.required' => 'Please Input Brand Name',
            'brand_name.min' => 'Brand Name Should be not Less Than 4 Character',

        ]
    );
    $brand_image = $request->file('brand_image');
    $name_generate = hexdec(uniqid());
    $image_extension = strtolower($brand_image->getClientOriginalExtension());
    $image_name =$name_generate.'.'.$image_extension;
    $up_location = 'image/brand/';
    $last_image = $up_location.$image_name;
    $brand_image->move($up_location,$image_name);

    Brand::insert([
        'brand_name'=>$request->brand_name,
        'brand_image'=>$last_image,
        'created_at'=>Carbon::now()
    ]);

    return Redirect()->back()->with('success','Brand inserted Successfully');
    }

    public function EditBrand($id){
        $brand= Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }
    public function UpdateBrand(Request $request,$id){
        $validateData = $request->validate([
            'brand_name'=>'required|min:5',
        ],
        [

            'brand_name.required' => 'Please Input Brand Name',
            'brand_name.min' => 'Brand Name Should be not Less Than 4 Character',

        ]
    );
    $old_image =$request->old_image;

    $brand_image = $request->file('brand_image');
    if($brand_image){
        $name_generate = hexdec(uniqid());
    $image_extension = strtolower($brand_image->getClientOriginalExtension());
    $image_name =$name_generate.'.'.$image_extension;
    $up_location = 'image/brand/';
    $last_image = $up_location.$image_name;
    $brand_image->move($up_location,$image_name);

    unlink($old_image);
    Brand::find($id)->update([
        'brand_name'=>$request->brand_name,
        'brand_image'=>$last_image,
        'created_at'=>Carbon::now()
    ]);

    return Redirect()->back()->with('success','Brand Updated Successfully');
    }
    else{
        Brand::find($id)->update([
            'brand_name'=>$request->brand_name,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->back()->with('success','Brand Updated Successfully');
    }

    
    }

    public function Deletebrand($id){
        $delete=Brand::find($id)->delete();
        return Redirect()->back()->with('success',"Brand deleted Successfully");

    }

}
