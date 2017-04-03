@extends('layouts.layout')


@section('content')
  <div class="album text-muted">
<div class="container-fluid">
@if (Session::has('cart'))
  <div class="row">
      <div class=" col-sm-12 col-md-12 ">
        <ul class="list-group">
          @foreach ($products as $product)
                <li class="list-group-item justify-content-between">
                  <span class="badge badge-default badge-pill">{{$product['qty']}}</span>
                  <strong>{{$product['item']['name']}}</strong>
                  <span class="label label-success">{{$product['price']}}</span>

                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Acties
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <a class="dropdown-item" href="{{route('products.reduceByOne', ['id' => $product['item']['id']])}}">Verwijder product</a>
                      <a class="dropdown-item" href="{{route('products.removeAll', ['id' => $product['item']['id']])}}">Verwijder alle producten</a>
                    </div>
                  </div>
                </li>
          @endforeach
        </ul>
      </div>
  </div>
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <strong>Total: {{$totalPrice}}</strong>
      </div>
  </div>
  <hr>
  <div class="row">
      <div class="col-md-12">
        <button type="button" class="btn btn-success pull-right">Betalen</button>
      </div>
  </div>

@else
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        No items in cart
      </div>
  </div>
@endif
</div>
</div>

@endsection
