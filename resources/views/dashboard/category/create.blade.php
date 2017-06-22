@extends('layouts.dashboard')

@section('page_heading', 'Categorieen')

@section('section')
    <div class="row">
        <div class="col-sm-8">
            @section ('cotable_panel_title','Maak Categorieen')
            @section ('cotable_panel_body')
                <form action="{{ route('categories.store') }}" method="post">
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
                    <button type="submit" class="btn btn-primary">Aanmaken</button>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection