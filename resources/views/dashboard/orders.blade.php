@extends('layouts.dashboard')

@section('page_heading', 'Orders')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Orders beheren')
            @section ('cotable_panel_body')
                <div class="row" style="margin-bottom: 2%;">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div id="imaginary_container">
                            <form action="{{ route('dashboard.orders') }}" method="get">
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
                <br>
                <table class="table">
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Geadresseerde
                        </th>
                        <th>
                            Totaal Prijs
                        </th>
                        <th>
                            Actie
                        </th>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                {{ $order->id }}
                            </td>
                            <td>
                                <a href="{{route('dashboard.products.edit', $order)}}">{{ $order->user->name }}</a>
                            </td>
                            <td>
                                {{ $order->totalPrice }}
                            </td>
                            <td>
                                <a href="{{ route('dashboard.products.edit', $order) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{ route('dashboard.orders.destroy', $order) }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('delete-order').submit();">
                                            <span class="glyphicon glyphicon-trash text-danger"
                                                  aria-hidden="true"></span>
                                </a>

                                <form id="delete-order" action="{{ route('dashboard.orders.destroy', $order) }}"
                                      method="POST">

                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $orders->appends(['q' => request('q')])->links() }}

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