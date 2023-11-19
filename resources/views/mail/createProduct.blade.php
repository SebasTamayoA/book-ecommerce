@extends('layouts.base')
@section('content') {{-- @yield('content') --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="alert alert-info text-center">Se creo un nuevo producto: {{$product->name}}</h1>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <p><strong>Name:</strong> {{$product->name}}</p>
                    <p><strong>Description:</strong> {{$product->description}}</p>
                    <p><strong>Author:</strong> {{$product->author}}</p>
                    <p><strong>Editorial:</strong> {{$product->editorial}}</p>
                    <p><strong>Year:</strong> {{$product->year}}</p>
                    <p><strong>Language:</strong> {{$product->language}}</p>
                    <p><strong>Stock:</strong> {{$product->stock}}</p>
                    <p><strong>Price:</strong> {{$product->price}}</p>
                    <p><strong>Category:</strong> {{$product->category->name}}</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

