@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edycja dania</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/restaurants/dishes/' . $dish->id . '/update') }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="">Nazwa Dania</label>
                                    <input type="text" name="name" class="form-control" value="{{ $dish->name }}" placeholder="Nazwa dania">

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
                                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                    <label for="">Kategoria Dania</label>
                                    <input type="text" name="category" class="form-control" value="{{ $dish->category }}" placeholder="Nazwa dania">

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="">Cena</label>
                                    <input type="text" name="price" class="form-control" value="{{ $dish->price }}" placeholder="cena dania">

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="">Opis</label>
                                    <input type="text" name="description" class="form-control" value="{{ $dish->description }}" placeholder="Opis Dania">

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-sm-10 col-sm-offset-1">
                                <a href="{{ url('/restaurants/' . $dish->restaurant_id . '/dishes') }}">Wróć</a>
                                <button type="submit" class="btn btn-primary btn-sm float-right">Zapisz zmiany</button>
                            </div>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
