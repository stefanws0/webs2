@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Persoonlijke gegevens</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ route("users.manage.update")  }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Naam</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-lg-offset-4">
                                <div class="col-md-1 checkbox-inline">
                                    <input id="notify" type="checkbox" class="form-control" name="notify" value="1"
                                           @if($user->notify) checked @endif>

                                </div>
                                <label for="notify" class=" control-label col-lg-offset-1">Nieuwsbrief ontvangen</label>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(isset($units))
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Lid van de volgende unit(s)</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($units as $unit)
                                <li class="list-group-item">{{$unit->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    @endif
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Wachtwoord wijzigen</div>
                <div class="panel-body">
                    @if(Session::has('password-confirmation'))
                        <div class="alert alert-success">
                            {{Session::get('password-confirmation')}}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ route("users.manage.changepassword") }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="password-old" class="col-md-4 control-label">Oude
                                Wachtwoord</label>

                            <div class="col-md-6">
                                <input id="password-old" type="password" class="form-control"
                                       name="password-old" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Wachtwoord</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"
                                       required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Bevestig
                                Wachtwoord</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



@endsection