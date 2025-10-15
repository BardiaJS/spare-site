<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    //
    public function show_category_form(){
        $categories = Category::all();
        return view ('add-category-form' , ['categories' => $categories]);
    }

    public function add_category(Request $request){

        $validated = $request->validate([
            'name' => ['required' , Rule::unique('categories' , 'name') ]
        ]);
        // return $validated;
        Category::create($validated);
        return redirect('/')->with('success','کتگوری جدید با موفقیت افزوده شد.');
    }

    public function show_edit_category_form(Category $category){
        return view('edit-category-form' , ['category' => $category]);
    }

    public function edit_category(Category $category , Request $request){
        $validated = $request->validate([
            'name' => ['required' , Rule::unique('categories' , 'name') ]
        ]);
        // return $validated;
        $category->update($validated);
        return redirect('/')->with('success',' تغییرات با موفقیت ثبت شد.');
    }

    public function delete_category(Category $category){
        $category->delete();
        return back()->with('success' , ' دسته بندی با موفقیت حذف شد. ');
    }
}
