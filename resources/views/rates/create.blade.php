@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Oceń zamówienie</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-{{ Session::get('code') }}">
                            <p>{{ Session::get('message') }}</p>
                        </div> 
                    @endif   
                    <form method="POST" action="{{ url('/rates/store') }}">
                        {{ csrf_field() }}
                           
                        <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $invoice->restaurant_id }}">
                        <input type="hidden" name="user_id" id="user_id" value="{{ $invoice->user_id }}">
                        <input type="hidden" name="invoice_id" id="invoice_id" value="{{ $invoice->id }}">

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <label for="rate">Ocena</label>
                                <select class="form-control" id="rate" type="text" class="form-control" name="rate">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="">Komentarz</label>
                                    <input type="text" name="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" value="{{ old('comment') }}" placeholder="Komentarz" required autofocus>

                                    @if ($errors->has('comment'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('comment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px;">
                            <div class="col-sm-10 col-sm-offset-1">
                                <button type="submit" class="btn btn-primary btn-sm float-right">Zapisz ocene</button>
                            </div>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
