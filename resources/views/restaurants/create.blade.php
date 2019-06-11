@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Restauracje</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/restaurants') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="">Nazwa restauracji</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nazwa restauracji">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="">Miasto</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}" placeholder="Wpisz miato restauracji">

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('adress') ? ' has-error' : '' }}">
                                    <label for="">Adres</label>
                                    <input type="text" name="adress" class="form-control" value="{{ old('adress') }}" placeholder="Wpisz adres">

                                    @if ($errors->has('adress'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('adress') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('avg_wait') ? ' has-error' : '' }}">
                                    <label for="">Średni czas oczekiwania</label>
                                    <input type="number" name="avg_wait" class="form-control" value="{{ old('avg_wait') }}" placeholder="Wpisz średni czas oczekiwania">

                                    @if ($errors->has('avg_wait'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('avg_wait') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('open_from') ? ' has-error' : '' }}">
                                    <label for="">Otwarte od</label>
                                    <input type="text" name="open_from" class="form-control" value="{{ old('open_from') }}" placeholder="Otwarte od">

                                    @if ($errors->has('open_from'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('open_from') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('open_till') ? ' has-error' : '' }}">
                                    <label for="">Otwarte do</label>
                                    <input type="text" name="open_till" class="form-control" value="{{ old('open_till') }}" placeholder="Otwarte do">

                                    @if ($errors->has('open_till'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('open_till') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="">Rodzaje dań(Pizza, pierogi, kebab itd)</label>
                                    <input type="text" name="description" class="form-control" value="{{ old('description') }}" placeholder="Pizza, Kebab">

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <label for="type">Typ</label>
                                    <select class="form-control" id="type" type="text" class="form-control" name="type">
                                        <option value="polish">Polska</option>
                                        <option value="turkish">Turecka</option>
                                        <option value="american">Amerykańska</option>
                                        <option value="chinese">Chińska</option>
                                        <option value="indian">Indyjska</option>
                                        <option value="italian">Włoska</option>
                                    </select>
                            </div>
                        </div> 



                        <div class="row" style="margin-top:20px;">
                            <div class="col-sm-10 col-sm-offset-1">
                                <button type="submit" class="btn btn-primary btn-sm float-right">Stwórz restaurację</button>
                            </div>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
