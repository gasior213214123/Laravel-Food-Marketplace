@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Koszyk</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($cart->count() !== 0)
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="name">Nazwa przedmiotu</td>
                                <td class="price">Cena</td>
                                <td class="quantity">Ilość</td>
                                <td class="total">Razem</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                            <tr>
                                <td class="cart_name">
                                    <h4>{{ $item->name }}</h4>
                                    <p>Web ID: {{ $item->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p> {{$item->price}} pln</p>
                                </td>
                                <td class="cart_quantity">
                                        <form action="{{ url('/cart/edit') }}">
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href="{{ url('/cart/' . $item->rowId . '/increment/' . $item->qty) }}"> + </a>
                                                <input class="cart_quantity_input" type="hidden" name="rowId" value="{{ $item->rowId }}" size="1">    
                                                <input class="cart_quantity_input" type="text" name="qty" value="{{ $item->qty }}" style="width: 35px;">
                                                <a class="cart_quantity_down" href="{{ url('/cart/' . $item->rowId . '/decrement/' . $item->qty) }}"> - </a> 
                                            </div>   
                                        </form>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ $item->subtotal }} pln</p>
                                </td>
                                <td class="cart_delete">
                                    <a href="{{ url('/cart/' . $item->rowId . '/remove') }}">Usuń</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                        <p>You have no items in the shopping cart</p>
                        @endif
                        </tbody>
                    </table>



                    <div class="col-sm-12">
                        <div class="col-sm-6 float-sm-left">
                            Całkowity koszt koszyka: <span>{{ Cart::subtotal() }} pln</span>
                        </div>
                        <div class="float-sm-right">
                            <div class="float-sm-left">
                                <a href="{{ url('/cart/destroy') }}"><button class="btn btn-danger">Wyczyść koszyk</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="card">
                <div class="card-header">Informacje kontaktowe</div>
                    <div class="card-body">
                        <form method="GET" id="cartform" action="{{ url('/paypal/express-checkout') }}">
                            <div class="form-group row">
                                <label for="city" class="text-md-left">Miasto</label>
                                <input type="text" id="city" name="city" @auth value="{{ Auth::user()->city }}" @endauth>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="text-md-left">Telefon</label>
                                <input type="text" id="phone" name="phone" @auth value="{{ Auth::user()->phone }}" @endauth>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="text-md-left">Email</label>
                                <input type="text" id="email" name="email" @auth value="{{ Auth::user()->email }}" @endauth>
                            </div>
                            <div class="form-group row">
                                <label for="adress" class="text-md-left">Adres</label>
                                <input type="text" id="adress" name="adress" @auth value="{{ Auth::user()->adress }}" @endauth>
                            </div>
                            <div class="form-group row">
                                <label for="info" class="text-md-left">Dodatkowe informacje:</label>
                                <textarea id="info" name="info" form="cartform" rows="4" cols="60" placeholder="Wpisz dodatkowe informacje..."></textarea>
                            </div>
                            <br>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-outline-primary btn-block">Zapłać <i class="fab fa-paypal"></i></button>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
