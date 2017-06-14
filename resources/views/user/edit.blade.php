@extends('layouts.dashboard')

@section('page_heading', 'Gebruikers')

@section('section')
    <script src="/js/blockuser.js"></script>
    <div class="row">
        <div class="col-sm-6">
            @section ('cotable_panel_title','Gebruikers aanpassen')
            @section ('cotable_panel_body')

                <form action="{{ route('users.update', $user) }}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}">

                        @if ($errors->has('name'))
                            <p class="help-block">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email adres</label>
                        <input type="email" class="form-control" name="email" id="email"
                               value="{{ old('email', $user->email) }}">

                        @if ($errors->has('email'))
                            <p class="help-block">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                        <div class="checkbox">
                            <label>
                                <input type="hidden" name="role_id" value="0">
                                <input type="checkbox" name="role_id" value="1"
                                        {{ old('role_id', $user->role_id) ? ' checked' : '' }}>
                                Administrator
                            </label>
                        </div>

                        @if ($errors->has('role_id'))
                            <p class="help-block">{{ $errors->first('role_id') }}</p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Wijzig</button>
                </form>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
@endsection