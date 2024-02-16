<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImgProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(6);
        return view ('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view ('admin.product.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //upload img
        // dd($request->all());
        // dd($request->hasFile('photos'));
        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs('public/images',$fileName);
        $request->merge(['image'=> $fileName]); //merge() Hàm này sẽ gộp các giá trị tương ứng có cùng key lại
        try {
            $product = Product::create($request->all());

            if($product && $request->hasFile('photos')){
                foreach($request->photos as $value){
                    $fileNames = $value->getClientOriginalName();
                    $value->storeAs('public/images',$fileNames);
                    ImgProduct::create([
                        'product_id'=> $product->id,
                        'image'=>$fileNames
                    ]);
                }
            }
            return redirect()->route('product.index')->with('success','Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->route('product.create')->with('error','Thêm  thất bại');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
