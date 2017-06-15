@extends('layouts.dashboard')

@section('page_heading', 'Producten')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Producten aanpassen')
            @section ('cotable_panel_body')

                <form action="{{ route('dashboard.products.update', $product) }}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Titel</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">

                        @if ($errors->has('name'))
                            <p class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Descriptie</label>
                        <textarea name="description" class="form-control" id="description" cols="30"
                                  rows="10">{{ old('description', $product->description) }}</textarea>

                        @if ($errors->has('description'))
                            <p class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Categorie</label>
                    <select class="form-control m-bot15" name="category_id">

                        @if ($categories->count())

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    </div>
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="title">Prijs</label>
                        <input type="number" class="form-control" id="price" name="price" min="0" max="10000" step="1"
                               value="{{ old('price') }}" required>

                        @if ($errors->has('price'))
                            <p class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Wijzig</button>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection