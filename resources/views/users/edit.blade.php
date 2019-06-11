@extends('layouts.app')

@section('content')
@include('layouts.user')
                <div class="tab-pane active" id="Edit" role="tabpanel">
                    <hr>
                    <form class="form" action="{{ url('/users/' . $user->id) }}" method="post" id="registrationForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col col-xs-6">
                                <label for="first_name"><h4>Imię i nazwisko</h4></label>
                                <input type="text" class="form-control" name="name" id="first_name" placeholder="{{ $user->name }}" value="{{ $user->name }}" title="Podaj swoje imie">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{ $user->email }}" value="{{ $user->email }}" title="Podaj swój email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif     
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col col-xs-6">
                                <label for="occupation"><h4>Rola</h4></label>
                                <select class="form-control"  id="occupation" type="text" class="form-control" name="occupation">
                                    <option value="Client" @if ($user->occupation == 'Client') selected @endif>Klient</option>
                                    <option value="Worker" @if ($user->Occupation == 'Worker') selected @endif>Pracownik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="col col-xs-6">
                                <label for="phone"><h4>Telefon</h4></label>
                                <input type="phone" class="form-control" name="phone" id="{{ $user->phone }}" placeholder="{{ $user->phone }}" value="{{ $user->phone }}" title="Podaj swój numer telefonu">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif      
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <div class="col col-xs-6">
                                <label for="city"><h4>Miasto</h4></label>
                                <input type="city" class="form-control" name="city" id="{{ $user->city }}" placeholder="{{ $user->city }}" value="{{ $user->city }}" title="Podaj swój numer telefonu">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif      
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('adress') ? ' has-error' : '' }}">
                            <div class="col col-xs-6">
                                <label for="adress"><h4>Adres</h4></label>
                                <input type="adress" class="form-control" name="adress" id="{{ $user->adress }}" placeholder="{{ $user->adress }}" value="{{ $user->adress }}" title="Podaj swój numer telefonu">
                                @if ($errors->has('adress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adress') }}</strong>
                                    </span>
                                @endif      
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-primary" type="submit"><i class="fas fa-check"></i> Zapisz zmiany</button>
                                <button class="btn btn-lg btn-danger float-right" type="reset"><i class="fas fa-redo-alt"></i> Reset</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
