<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function add_product_to_order(Request $request , Product $product){
        $validated ['customer_id'] = Auth::user()->customer->id;
        $validated ['product_id'] = $product->id;
        Order::create($validated);
        return redirect('/all-productions')->with('success','Added to purchases order successfully!');
    }
}
