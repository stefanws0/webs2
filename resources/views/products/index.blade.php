@extends('layouts.layout')


@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Products</h1>
            <p class="lead text-muted">These are the products our webshop is going to sell</p>
            <p>
                <a href="#" class="btn btn-primary">IDK</a>
                <a href="#" class="btn btn-secondary">Somekind of action</a>
            </p>
        </div>
    </section>
    <div class="album text-muted">
        <div class="container">
            <div1 class="row">
                @foreach ($products as $product)
                    <div class="card col-md-4">
                        <p class="card-text text-center">{{ $product->name }}</p>
                        <a href="/products/{{$product->id}}" class="btn btn-primary pull-right">Go Here</a>
                    </div>
                @endforeach
            </div1>
         </div>
    </div>
@endsection