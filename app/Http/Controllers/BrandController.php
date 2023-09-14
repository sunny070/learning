<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    Public function Brand(){
        $brands=Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

}
