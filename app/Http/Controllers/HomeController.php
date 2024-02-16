<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $productsFatured = Product::where('stock',1)->get();
        // dd($productsFatured);
        $newProducts = Product::orderBy('created_at','DESC')->take(3)->get();

        return view('fe.home',compact('productsFatured','newProducts'));
    }

    public function detail($slug){
        $product = Product::where('slug',$slug)->first();
        //
        $related = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->get();
        return view('fe.detail',compact('product','related'));
    }
}
