@extends('layouts.master')
    @section('content')

    <div class="container">
        <h1>Lista de productos</h1>
        @empty ($products)
            <div class="alert alert-warning">
                No hay productos por el momento
            </div>
        @else           
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $product)
                    <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->status}}</td>
                    </tr>
                    @endforeach                   
                    
                </tbody>
            </table>
        </div>
        @endempty
    </div> 

    @endsection
    
