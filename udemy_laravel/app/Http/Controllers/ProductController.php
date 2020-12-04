<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
       //$products = DB::table('products')->get();       
       //return $products;
        //dd($products);      
        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(){
        //
        //dd('Estamos en store');
        $product = Product::create(request()->all());
    }

    public function show($product){
        // $product = DB::table('products')->where('id', $product)->get();
        // $product = DB::table('products')->find($product);
        $product = Product::findorFail($product);
        // dd($product);
        //return $product;
        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    public function update($product){
        //
    }

    public function destroy($product){
        //
    }
}
