<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        return 'Esta es la lista de productos del controller';
    }

    public function create(){
        return 'Este es el formulario para crear productos';
    }

    public function store(){
        //
    }

    public function show($product){
        return "Mostrar producto por id {$product}";
    }

    public function update($product){
        //
    }

    public function destroy($product){
        //
    }
}
