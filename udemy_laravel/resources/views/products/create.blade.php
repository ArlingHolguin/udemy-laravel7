@extends('layouts.app')
    @section('content')
    
        {{-- Comentario Blade--}}  
        <h1>Crear un producto</h1>     
    <form action="{{ route('products.store')}}" method="post">
        @csrf
        <div class="form-row">
            <label for="title">Titulo</label>
            <input type="text" name="title" class="form-control" value="{{ old ('title') }}">
        </div>
        <div class="form-row">            
            <label for="description">Descripción</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
        </div>
        <div class="form-row">
            <label for="price">Precio</label>
            <input type="number" name="price" min="1.00" step="0.01" class="form-control" value="{{ old('price') }}" >
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" name="stock" min="0" class="form-control" value="{{ old('stock') }}">
        </div>
        <div class="form-row">
            <label for="status">Estado</label>
            <select name="status" class="custom-select" >

                <option value="" selected>Seleccione...</option>

                <option {{ old('status') == 'available' ? 'selected' : '' }} value="available">Available</option>

                <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>

            </select>
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Crear Producto</button>
        </div>
    </form>   
                   
   
    @endsection

