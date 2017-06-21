@extends('layouts.dashboard')

@section('page_heading', 'Producten')

@section('section')
    <div class="row">
        <div class="col-sm-8">
            @section ('cotable_panel_title','Maak Product')
            @section ('cotable_panel_body')
                <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Titel</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name') }}" required>

                        @if ($errors->has('name'))
                            <p class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Descriptie</label>
                        <textarea name="description" class="form-control" id="description" cols="30"
                                  rows="10" required>{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                            <p class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image">Foto</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*"
                               value="{{ old('image') }}" required>

                        @if ($errors->has('image'))
                            <p class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Categorie</label>
                    <select class="form-control m-bot15" name="category_id">

                        @if ($categories->count())

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                    <button type="submit" class="btn btn-primary">Aanmaken</button>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection