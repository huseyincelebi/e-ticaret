<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class App extends Controller
{
    function main(){
        $categories = DB::table('k_categories')->get();
        $products = DB::table('k_products')->skip(0)->take(4)->get();
        return view('index',['categories'=>$categories,'products'=>$products]);
    }
    function products(Request $request){
        if($request->get("query")=="new"){
            $products = DB::table('k_products')->orderBy('id', 'ASC')->Paginate(6);
        }
        else if($request->get("query")=="old"){
            $products = DB::table('k_products')->orderBy('id', 'DESC')->Paginate(6);
        }
        else if($request->get("query")=="low"){
            $products = DB::table('k_products')->orderBy('price', 'ASC')->Paginate(6);
        }
        else if($request->get("query")=="high"){
            $products = DB::table('k_products')->orderBy('price', 'DESC')->Paginate(6);
        }
        else{
            $products = DB::table('k_products')->Paginate(6);
        }
        $categories = DB::table('k_categories')->get();
        return view('products',['products'=>$products,'categories'=>$categories]);
    }
    function category(Request $request){
        if($request->get("query")=="new"){
            $products = DB::table('k_products')->where(['category_id'=>$request->id])->orderBy('id', 'ASC')->Paginate(6);
        }
        else if($request->get("query")=="old"){
            $products = DB::table('k_products')->where(['category_id'=>$request->id])->orderBy('id', 'DESC')->Paginate(6);
        }
        else if($request->get("query")=="low"){
            $products = DB::table('k_products')->where(['category_id'=>$request->id])->orderBy('price', 'ASC')->Paginate(6);
        }
        else if($request->get("query")=="high"){
            $products = DB::table('k_products')->where(['category_id'=>$request->id])->orderBy('price', 'DESC')->Paginate(6);
        }
        else{
            $products = DB::table('k_products')->where(['category_id'=>$request->id])->Paginate(6);
        }
        $categories = DB::table('k_categories')->get();
        return view('category',['products'=>$products,'categories'=>$categories,'id'=>$request->id]);
    }
    function product(Request $request){
        $product = DB::table('k_products')->where(['id'=>$request->id])->first();
        $categories = DB::table('k_categories')->get();
        $comments_count = DB::table('k_comments')->where(['product_id'=>$request->id])->count();
        $comments = DB::table('k_comments')->where(['product_id'=>$request->id])->Paginate(6);;
        return view('product',['product'=>$product,'categories'=>$categories,'comments_count'=>$comments_count,'product_id'=>$request->id,'comments'=>$comments]);
    }
    function addcomment(Request $request){
        DB::table('k_comments')->insert(['product_id'=>$request->productid,'name'=>$request->personalname,'comment'=>$request->productcomment]);
        return redirect()->back();
    }
    function buyproduct(Request $request){
        $product = DB::table('k_products')->where(['id'=>$request->productid])->first();
        DB::table('k_purchases')->insert(['product_id'=>$request->productid,'name'=>$request->personalname,'email'=>$request->personalemail]);
        Mail::send("email.test",["product"=>$product,'name'=>$request->personalname,'email'=>$request->personalemail],function ($message){
            $message->to("sofcmail@gmail.com","Hüseyin")->subject("Ürün Satın Alındı");
         });
         return redirect()->back();
    }
    function search(Request $request){
        if($request->get("query")=="new"){
            $products = DB::table('k_products')->where('name', 'LIKE', "%$request->keyword%")->orderBy('id', 'ASC')->Paginate(6);
        }
        else if($request->get("query")=="old"){
            $products = DB::table('k_products')->where('name', 'LIKE', "%$request->keyword%")->orderBy('id', 'DESC')->Paginate(6);
        }
        else if($request->get("query")=="low"){
            $products = DB::table('k_products')->where('name', 'LIKE', "%$request->keyword%")->orderBy('price', 'ASC')->Paginate(6);
        }
        else if($request->get("query")=="high"){
            $products = DB::table('k_products')->where('name', 'LIKE', "%$request->keyword%")->orderBy('price', 'DESC')->Paginate(6);
        }
        else{
            $products = DB::table('k_products')->where('name', 'LIKE', "%$request->keyword%")->Paginate(6);
        }
        $categories = DB::table('k_categories')->get();
        return view('search',['products'=>$products,'categories'=>$categories,'id'=>$request->id]);
    }
}
