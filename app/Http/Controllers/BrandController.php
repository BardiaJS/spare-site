<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function add_brand_form(){
        return view('add-brand-from');
    }
    public function add_brand(Request $request){
        $validated = $request->validate([
            'name' => ['required' , Rule::unique('brands' , 'name')]
        ]);

        Brand::create($validated);
        return redirect('/')->with('success','برند جدید با موفقیت اضافه شد.');
    }
}
