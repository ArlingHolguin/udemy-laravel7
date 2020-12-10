<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Support\Facades\DB;

//use Illuminate\Http\Request;

class ProductController extends Controller
{   public function __construct()
{
   $this->middleware('auth'); 
}
    //con esta funcion  retorna la vista de todos los prodcutos 
    public function index(){
       //$products = DB::table('products')->get();       
       //return $products;
        //dd($products);      
        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }



    // esta funcion returna a la vista create o sea formulario de crear producto 
    public function create(){
        return view('products.create');
    
    }


    //recibe a Create de la vista create
    public function store(ProductRequest $request){        
        $product = Product::create($request->validated());        
        return redirect()
        ->route('products.index')
        ->withSuccess("El producto con id {$product->id} ha sido creado");
    }



    //recibe todos los prodcutos  del modelo Product y lo retorna en la vista Show
    public function show(Product $product){
        // $product = DB::table('products')->where('id', $product)->get();
        // $product = DB::table('products')->find($product);
        // $product = Product::findorFail($product);
        // dd($product);
        //return $product;
        return view('products.show')->with([
            'product' => $product,
            
        ]);
    }



    //Esta funcion trae productos del modelo Product considerando su id 
    public function edit(Product $product){
        return view('products.edit')->with([
            'product' => $product,
        ]);
    }


    // Esta funcion recibe datos de la vista edit parara ser actualizados en la base de datos retornando a la vita principal  
    public function update(ProductRequest $request, Product $product){         
        $product->update($request->validated());//reglas de validacion
        return redirect()
        ->route('products.index')
        ->withSuccess("El producto con id {$product->id} ha sido editado");
    }



    // Con esta funcion traemos el id de la tabla  Product y eliminamos  retornando a la vista principal 
    public function destroy(Product $product){
        //
        //$product = Product::findOrFail($product);
        $product->delete();
        return redirect()
        ->route('products.index')
        ->withSuccess("El producto con id {$product->id} ha sido eliminado");

    }
}
