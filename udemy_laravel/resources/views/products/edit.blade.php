@extends('layouts.master')
    @section('content')
    <div class="container">
        {{-- Comentario Blade--}}  
        <h1>Editar un producto</h1>     
    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}" >
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="title">Titulo</label>
        <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
        </div>
        <div class="form-row">
            <label for="description">Descripción</label>
            <input type="text" name="description" class="form-control" value="{{ $product->description }}" required>
        </div>
        <div class="form-row">
            <label for="price">Precio</label>
            <input type="number" name="price" min="1.00" step="0.01" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" name="stock" min="0" class="form-control" value="{{ $product->stock }}" required>
        </div>
        <div class="form-row">
            <label for="status">Estado</label>
            <select name="status" id="status" class="custom-select" required>
                <option {{ $product->status == 'available' ? 'selected' : '' }} value="available">Available</option>
                <option {{ $product->status == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Editar Producto</button>
        </div>
    </form>   
                   
    </div>
    @endsection