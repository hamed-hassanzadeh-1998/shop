<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $colors=ProductColor::all();
        return view('admin.market.product.color.index',compact('colors','product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.market.product.color.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Product $product)
    {
        $validated=$request->validate([
            'color_name'=>'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'price_increase'=>'required|numeric'
        ]);

        $inputs=$request->all();
        $inputs['product_id']=$product->id;
        $productColor=ProductColor::create($inputs);
        return redirect()->route('admin.market.color.index',$product->id)->with('swal-success','رنگ محصول با موفقیت اضافه شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product,ProductColor $color)
    {
       $color->delete();
        return redirect()->route('admin.market.color.index',$product->id)->with('swal-success','رنگ محصول با موفقیت حذف شد');
    }
}
