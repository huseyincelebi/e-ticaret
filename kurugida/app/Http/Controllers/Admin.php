<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    function main(){
        return view('admin/index');
    }
    function category(Request $request){
        $category_count = DB::table('k_categories')->count();
        $categories = DB::table('k_categories')->Paginate(10);
        $editcategory = DB::table('k_categories')->where(['id'=>$request->edit])->first();
        return view('admin/category',['category_count'=>$category_count,'categories'=>$categories,'editcategory'=>$editcategory]);
    }
    function addcategory(Request $request){
        DB::table('k_categories')->insert(['name'=>$request->categoryname]);
        return redirect()->back();
    }
    function deletecategory(Request $request){
        DB::table('k_categories')->delete(['id'=>$request->id]);
        return redirect()->back();
    }
    function product(Request $request){
        $categories = DB::table('k_categories')->get();
        $product_count = DB::table('k_products')->count();
        $products = DB::table('k_products')->Paginate(10);
        $editproduct = DB::table('k_products')->where(['id'=>$request->edit])->first();
        return view('admin/product',['product_count'=>$product_count,'products'=>$products,'categories'=>$categories,'editproduct'=>$editproduct]);
    }
    function addproduct(Request $request){
        $imagename = time().".".$request->file('productimage')->getClientOriginalExtension();
        $request->file('productimage')->move(public_path('images/products'),$imagename);
        DB::table('k_products')->insert(['category_id'=>$request->productcategory,'name'=>$request->productname,'description'=>$request->productdesc,'price'=>$request->productprice,'image'=>$imagename]);
        return redirect()->back();
    }
    function deleteproduct(Request $request){
        DB::table('k_products')->delete(['id'=>$request->id]);
        return redirect()->back();
    }
    function editproduct(Request $request){
        if($request->hasFile('productimage')){
            $imagename = DB::table('k_products')->where(['id'=>$request->productid])->value('image');
            $request->file('productimage')->move(public_path('images/products'),$imagename);
            DB::table('k_products')->where(['id'=>$request->productid])->update(['category_id'=>$request->productcategory,'name'=>$request->productname,'description'=>$request->productdesc,'price'=>$request->productprice,'image'=>$imagename]);
        }
        else{
            DB::table('k_products')->where(['id'=>$request->productid])->update(['category_id'=>$request->productcategory,'name'=>$request->productname,'description'=>$request->productdesc,'price'=>$request->productprice]);
        }
        return redirect()->back();
    }
    function editcategory(Request $request){
        DB::table('k_categories')->where(['id'=>$request->categoryid])->update(['name'=>$request->categoryname]);
        return redirect()->back();
    }
    function purchase(Request $request){
        $purchase_count = DB::table('k_purchases')->count();
        $purchases = DB::table('k_purchases')->Paginate(10);
        $products = DB::table('k_products')->get();
        return view('admin/purchase',['purchase_count'=>$purchase_count,'purchases'=>$purchases,'products'=>$products]);
    }
}
