<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    //
    public function show_product_sale_form(){
        $brands = Brand::all('name');
        $categories = Category::all('name');
        return view("add-product.add-product-form" , ['categories' => $categories,'brands'=> $brands]);
    }


    public function put_product_for_sale(Request $request){
        $brandName = $request->input("brand");
        $brandId = Brand::where('name', $brandName)->firstOrFail()->id;
        $categoryName = $request->input("category");
        $categoryId = Category::where("name", $categoryName)->firstOrFail()->id;
        $validated = $request->validate([
            'title' => ['required'] ,
            'information' => ['required'],
            'value' => ['required'] ,
            'vehicle' => ['required'] ,
        ]);
        $validated ['admin_id'] = Auth::user()->admin->id;
        $validated['brand_id'] = $brandId;
        $validated['category_id'] = $categoryId;
        $product = Product::create($validated);
        return view('product-image.product-image-form' , ["product" => $product]);
    }

    public function show_product_image_form(){
        return view('product-image.product-image-form');
    }

    public function set_product_image(Request $request , Product $product){
        $request->validate([
            'image_product' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Delete old avatar if exists
        if ($product->avatar && Storage::disk('public')->exists($product->avatar->path)) {
            Storage::disk('public')->delete($product->avatar->path);
        }

        // Process new image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('image_product'));
        $image->cover(500, 500); // Square avatar

        $filename = 'images/product-' . $product->id . '-' . uniqid() . '.jpg';
        
        Storage::disk('public')->put($filename, $image->toJpeg(80));

        // Update or create avatar
        Image::updateOrCreate(
            ['product_id' => $product->id],
            ['path' => $filename]
        );

        $product_id = $product->id;

        return redirect("/single-product/product/$product_id")->with('success', 'Successfull!');
    }

    public function get_all_productions(){
        $all_productions = Product::paginate(1);
        return view('all-products.list-all-productions', ['productions'=> $all_productions]);
    }

    public function show_single_product(Product $product){
        return view('single-product.single-product-page' , ['product'=> $product]);
    }

    public function show_all_comments_of_product(Product $product){
        $comments = $product->comments()->paginate(1);
        return view ('all-comments.all-comments-of-product' , ['comments' => $comments]);
    }
// 
    public function show_shopping_cart (){
        $customerId = Auth::user()->customer->id;
        $products = Product::join('orders', 'products.id', '=', 'orders.product_id')
        ->where('orders.customer_id', $customerId)
        ->select('products.*') // or select specific columns
        ->paginate(1);

        return view('shopping-cart.shopping-cart', ['productions' => $products]);
    }
}
