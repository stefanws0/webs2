@extends('layouts.layout')


@section('content')

    <link href="css/contact.css" rel="stylesheet">
    <div class="col-12">

        <div class="panel">
            <div class="panel-heading">
                <h3 class="text-center">
                            <address>
                                <h3><strong>RetroChic</strong></h3>
                                <h4>Markt 12<br>
                                    5995 CB Kessel</h4><br>
                                <h5><strong>Co-Founder Stefan Willems</strong></h5>
                                <h6>stefankessel@hotmail.com<br>
                                    +31 631 962 291</h6><br>
                                <h5><strong>Co-Founder Jonathan Hollander</strong></h5>
                                <h6>idk<br>
                                    idk</h6><br>
                            </address><br>

                    <i class="icon-envelope main-color"></i>
                    Nog vragen? Stuur ze gerust
                </h3>
            </div>
            <div class="panel-body">
                <form method="post" action="{{ route('contact.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="ccfield-prepend">
                            <span class="ccform-addon"><i class="fa fa-user fa-2x"></i></span>
                            <input type="text" class="ccformfield" id="name" placeholder="Volledige naam" name="name"
                                   value="{{ old('name') }}" required>
                        </div>
                        @if ($errors->has('name'))
                            <p class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="ccfield-prepend">
                            <span class="ccform-addon"><i class="fa fa-envelope fa-2x"></i></span>
                            <input type="text" class="ccformfield" id="email" placeholder="Email" name="email"
                                   value="{{ old('email') }}" required>
                        </div>
                        @if ($errors->has('email'))
                            <p class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <div class="ccfield-prepend">
                            <span class="ccform-addon"><i class="glyphicon glyphicon-phone fa-2x"></i></span>
                            <input type="text" class="ccformfield" id="phone" placeholder="Telefoonnummer" name="phone"
                                   value="{{ old('phone') }}" required>
                        </div>
                        @if ($errors->has('phone'))
                            <p class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        <div class="ccfield-prepend">
                            <span class="ccform-addon"><i class="fa fa-info fa-2x"></i></span>
                            <input type="text" class="ccformfield" id="subject" placeholder="Onderwerp" name="subject"
                                   value="{{ old('subject') }}" required>
                        </div>
                        @if ($errors->has('subject'))
                            <p class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </p>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <div class="ccfield-prepend">
                            <span class="ccform-addon"><i class="fa fa-comment fa-2x"></i></span>
                            <textarea name="message" class="ccformfield" placeholder="Bericht" id="message" cols="30"
                                      rows="10" required>{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="ccfield-prepend">
                        <input class="btn-primary" type="submit" value="Verzenden">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection