@extends('layouts.dashboard')

@section('page_heading', 'Producten')

@section('section')
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Producten aanpassen')
            @section ('cotable_panel_body')

                <form action="{{ route('products.update', $product) }}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}">

                        @if ($errors->has('name'))
                            <p class="help-block">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="email">Email adres</label>
                        <input type="text" class="form-control" name="description" id="description"
                               value="{{ old('description', $product->description) }}">

                        @if ($errors->has('description'))
                            <p class="help-block">{{ $errors->first('description') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <div class="checkbox">
                            <label>
                                <input type="hidden" name="price" value="0">
                                <input type="checkbox" name="price" value="1"
                                        {{ old('price', $user->price) ? ' checked' : '' }}>
                                Administrator
                            </label>
                        </div>

                        @if ($errors->has('price'))
                            <p class="help-block">{{ $errors->first('price') }}</p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Wijzig</button>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection