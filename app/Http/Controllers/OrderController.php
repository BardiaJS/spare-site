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
        return redirect('/shopping-cart')->with('success','محصول با موفقیت به سبد خرید اضافه شد.');
    }

    public function delete_from_order(Request $request , Order $order){
        $order->delete();
        return redirect('/shopping-cart')->with('success','محصول با موفقیت از سبد خرید حذف شد.');
    }
}
