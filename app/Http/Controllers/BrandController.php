<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function add_brand_form(){
        $brands = Brand::all();
        return view('add-brand-from' , ['brands' => $brands]);
    }
    public function add_brand(Request $request){
        $validated = $request->validate([
            'name' => ['required' , Rule::unique('brands' , 'name')]
        ]);

        Brand::create($validated);
        return redirect('/')->with('success','برند جدید با موفقیت اضافه شد.');
    }

    public function show_edit_brand_form(Brand $brand){
        return view('edit-brand-form' , ['brand' => $brand]);
    }

    public function edit_brand(Brand $brand , Request $request){
        $validated = $request->validate([
            'name' => ['required' , Rule::unique('brands' , 'name')]
        ]);

        $brand->update($validated);
        return redirect('/')->with('success','تغییرات با موفقیت ثبت شد.');
    }

    public function delete_brand(Brand $brand){
        $brand->delete();
        return back()->with('success' , ' برند با موفقیت حذف شد.');
    }
}
