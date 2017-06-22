@extends('layouts.dashboard')

@section('page_heading', 'Producten')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Producten beheren')
            @section ('cotable_panel_body')
                <div class="row" style="margin-bottom: 2%;">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div id="imaginary_container">
                            <form action="{{ route('products.index') }}" method="get">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Zoeken" value="{{ request('q') }}">
                                    <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Zoek</button>
                            </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="{{ route('dashboard.products.create') }}" class="btn- btn-link">Maak een product</a>
                <br>
                <table class="table">
                    <tr>
                        <th>
                            Naam
                        </th>
                        <th>
                            Categorie
                        </th>
                        <th>
                            Prijs
                        </th>
                        <th>
                            Actie
                        </th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $product->foo->name }}
                            </td>
                            <td>
                                {{ $product->price }}
                            </td>
                            <td>
                                <a href="{{ route('dashboard.products.edit', $product) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{ route('dashboard.products.destroy', $product) }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('delete-product-{{ $product->id }}').submit();">
                                            <span class="glyphicon glyphicon-trash text-danger"
                                                  aria-hidden="true"></span>
                                </a>

                                <form id="delete-product-{{ $product->id }}" action="{{ route('dashboard.products.destroy', $product) }}"
                                      method="POST">

                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $products->appends(['q' => request('q')])->links() }}

                <p>
                    <a href="{{ route('dashboard.index') }}" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        Terug naar dashboard
                    </a>
                </p>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection