<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
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
    public function store(){
        //reglas de validacion
        $rules =[
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price'=> ['required', 'min:1'],
            'stock'=> ['required', 'min:0'],
            'status'=> ['required', 'in:available,unavailable'],

        ];
        request()->validate($rules);


        //dd('Estamos en store');
        if(request()->status == 'available' && request()->stock == 0){
            // session()->put('error', 'No puede crear un stock de cero y poner el prodcuto disponible');
            //session()->flash('error', 'No puede crear un stock de cero y poner el prodcuto disponible');
            return redirect()
            ->back()
            ->withInput(request()->all())
            ->withErrors('No puede crear un stock de cero y poner el prodcuto disponible');
        }
       
        $product = Product::create(request()->all());
        //return redirect()->back();
        // return redirect()->action('MainController@index');
        //session()->flash('success', "El producto con id {$product->id} ha sido creado");
        return redirect()
        ->route('products.index')
        ->withSuccess("El producto con id {$product->id} ha sido creado");
    }



    //recibe todos los prodcutos  del modelo Product y lo retorna en la vista Show
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



    //Esta funcion trae productos del modelo Product considerando su id 
    public function edit($product){
        return view('products.edit')->with([
            'product' => Product::findOrFail($product),
        ]);
    }


    // Esta funcion recibe datos de la vista edit parara ser actualizados en la base de datos retornando a la vita principal  
    public function update($product){
         //reglas de validacion
         $rules =[
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price'=> ['required', 'min:1'],
            'stock'=> ['required', 'min:0'],
            'status'=> ['required', 'in:available,unavailable'],

        ];
        request()->validate($rules);

        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()
        ->route('products.index')
        ->withSuccess("El producto con id {$product->id} ha sido editado");
    }



    // Con esta funcion traemos el id de la tabla  Product y eliminamos  retornando a la vista principal 
    public function destroy($product){
        //
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()
        ->route('products.index')
        ->withSuccess("El producto con id {$product->id} ha sido eliminado");

    }
}
