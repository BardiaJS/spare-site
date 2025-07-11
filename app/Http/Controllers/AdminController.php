<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function become_admin_form(Request $request){
        return view("become-admin-form");
    }

    public function become_admin(Request $request , User $user){
        $validated = $request->validate([
            'information' => ['required'],
            'age' => ['required'],
        ]);
        $validated['user_id'] = $user->id;
        if($validated['age'] >= 18){
            Admin::create($validated);
            return redirect('/')->with('success','You successfully completed admin details!');
        }
    }

    public function admin_information_form(Admin $admin){
        return view('admin-information-form');
    }

    public function change_admin_information(Request $request ,  Admin $admin){
        $validated = $request->validate([
            'information' => ['sometimes'],
        ]);

        $admin->update($validated);
        return redirect('/')->with('success','Admin information updated successfully!');
    }
}
