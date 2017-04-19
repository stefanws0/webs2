@extends ('layouts.layout')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <hr>
        <p>{{ $product->description }}</p>
        <p>Dit product kost: €{{ $product->price }},-
            <button type="submit" class="btn btn-primary pull-right">Buy</button>
        </p>
        <hr>
        <div class="reviews">
            <ul class="form-group col-md-12 nopadding">
                @foreach($product->reviews as $review)
                <div class="list-group-item">
                    <li class="list-group">
                        <h5>{{$review->title}}</h5>
                        <hr>
                        {{$review->body}}
                        <strong>
                            {{$review->created_at->diffForHumans()}} by {{$review->user->name}}
                        </strong>
                    </li>
                    </div>
                @endforeach
            </ul>
        </div>

        {{-- Add a comment --}}
        <hr>

        <div class="card">
            <div class="card-block">
                <form method="POST", action="/products/{{$product->id}}/reviews">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" placeholder="title" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Your message here" class="form-control" id="body" name="body" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection