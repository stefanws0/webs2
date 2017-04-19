@extends('layouts.dashboard')

@section('content')
    <h1>Create a Product</h1>

    <hr>

    <form method="post" action="/products">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
        </div>

        @include('layouts.errors')
    </form>
@endsection
