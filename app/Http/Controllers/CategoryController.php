<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    //
    public function show_category_form(){
        return view ('add-category-form');
    }

    public function add_category(Request $request){

        $validated = $request->validate([
            'name' => ['required' , Rule::unique('categories' , 'name') ]
        ]);
        // return $validated;
        Category::create($validated);
        return redirect('/')->with('success','کتگوری جدید با موفقیت افزوده شد.');
    }
}
