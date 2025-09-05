<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function buy(){
        $random_number = rand(0 , 100);
        $customer_id = Auth::user()->customer->id;
        if($random_number % 2 == 0){
            Order::where('customer_id', $customer_id)->delete();
            return redirect('/')->with('success' , 'خرید با موفقیت انجام شد');
        }else{
            return back()->with('error' , 'ایراد در درگاه پرداخت');
        }
    }
}
