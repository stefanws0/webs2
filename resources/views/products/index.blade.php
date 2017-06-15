@extends('layouts.layout')


@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">@if( ! empty($categoryName))
                    {{$categoryName}}
                                              @else
                                              Producten
                @endif</h1>
            <p class="lead text-muted">These are the products our webshop is going to sell</p>
            <p>
                <a href="#" class="btn btn-primary"></a>
                <a href="#" class="btn btn-secondary">Somekind of action</a>
            </p>
        </div>
    </section>
    <div class="album text-muted">
        <div class="container-fluid">
            @foreach(array_chunk($products->all(), 3) as $threeProducts)
                <div class="row">
                    @foreach ($threeProducts  as $product)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="pull-right">
                                        ${{$product->price}}
                                    </div>
                                </div>
                                <div class="card-block">
                                    <h4 class="card-title">{{$product->name}}</h4>
                                    <p></p>

                                    <p class="card-text text-center">{{ $product->description }}</p>

                                </div>
                                <div class="card-footer">
                                    <a href="/products/{{$product->id}}" class="btn btn-primary pull-left">
                                        <i class="fa fa-info" aria-hidden="true">
                                        </i>
                                    </a>
                                    <a href="{{route('products.addToCart',['id' => $product->id])}}" class="btn btn-success pull-right">
                                        Add to Cart
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection