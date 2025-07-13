<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function ban_user(User $user){
        $validated ['user_id'] = $user->id;
        $validated['admin_id'] = Auth::user()->admin->id;

        Ban::create($validated);
        return back()->with('success','User banned successfully!');
    }

    public function unban_user(User $user){
        DB::table('bans')->where('user_id', $user->id)->delete();
        return back()->with('success', 'User unbanned successfully');
    }
}
