@extends ('layouts.layout')

@section('content')
    <div class="container">
        <p>
            <a href="/">Home</a> > <a href="/products/?category={{$product->foo->id}}">{{$product->foo->name}}</a> > {{$product->name}}
        </p>
        <hr>
        <p>
            <h4>{{ $product->name }}</h4>
            <h6>{{ $product->description }}</h6>
        </p>
        <p>Dit product kost: €{{ $product->price }},-
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
                            {{$review->created_at->diffForHumans()}}
                        </strong>
                    </li>
                    </div>
                @endforeach
            </ul>
        </div>

        {{-- Add a comment --}}
        <hr>
        <h3>plaats hier je review</h3>
        <div class="card">
            <div class="card-block">
                <form method="POST", action="/products/{{$product->id}}/reviews">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" placeholder="Titel" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Bericht" class="form-control" id="body" name="body" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Publiceren</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection