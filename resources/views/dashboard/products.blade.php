@extends('layouts.dashboard')


@section('content')
  <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
                      <a class="btn btn-success pull-right" role="button" href="/dashboard/products/create">Product Aanmaken</a>
            </div>
            <div class="card-block">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Product Naam</th>
                    <th>Prijs</th>
                    <th>Category</th>
                    <th>#</th>
                  </tr>
                </thead>
                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->nation }}</td>
                                    <td>
                                        <a href="dashboard/products/edit/{{ $product->id }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="dashboard/products/delete/{{ $product->id }}">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
          </div>
        </div>
    </div>
@endsection
