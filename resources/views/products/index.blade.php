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
            <form action="{{ route('products.index') }}" method="get">
                <div class="input-group">
                    <input type="text" style="margin: 0px;" name="q" class="form-control" placeholder="Zoeken" value="{{ request('q') }}">
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Zoek</button>
                            </span>
                </div>
            </form>
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
                                        {{$product->name}}
                                    </div>
                                </div>
                                <div class="card-block">
                                    <img style="height: 100px" src="{{asset("storage/$product->id.jpeg")}}" />
                                    <p></p>

                                    <p class="card-text text-center">{{ $product->description }}</p>

                                </div>
                                <div class="card-footer">
                                    <div class="pull-left visible-lg-inline-block">
                                        ${{$product->price}}
                                    </div>
                                    <a href="/products/{{$product->id}}" class="btn btn-primary pull-left">

                                        <i class="glyphicon glyphicon-info-sign" aria-hidden="true">
                                            Info
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