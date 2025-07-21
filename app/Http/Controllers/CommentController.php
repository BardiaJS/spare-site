<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function show_comment_form(Product $product){
        return view('comment-form' , ['product' => $product]);
    }
    public function add_comment(Request $request , Product $product){
        $validated = $request->validate([
            'body' => ['required' , 'max:50' , 'not_regex:/(fuck|boobs|dick|shit|asshole)/i']
        ]);

        $validated['product_id'] = $product->id;
        $validated['customer_id'] = Auth::user()->customer->id;
        $product_id = $product->id;
        Comment::create($validated);
        return redirect("/single-product/product/$product_id")->with('success','Comment added Successfully!');
    }

    public function delete_comment(Comment $comment){
        $product_id = $comment->product_id;
        $comment->delete();
        return redirect("/show-all-comments/product/{$product_id}")->with("success","Comment deleted successfully!");
    }

    public function edit_comment_form(Comment $comment){
        return view("edit-comment-form" , ["comment"=> $comment]);
    }

    public function edit_comment (Request $request , Comment $comment){
        $validated = $request->validate([
            'body' => ['sometimes']
        ]);
        $product_id = $comment->product_id;
        $comment->update($validated);
        return redirect("/show-all-comments/product/$product_id")->with('success','Update the comment successfully!');
    }
}
