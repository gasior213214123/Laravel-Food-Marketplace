@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Status zamówienia</div>

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
                        @if (Session::get('code') == 'success')
                            @if ($user_id == auth::id())
                                <h3>{{ $name }}</h3>
                                <p>ID zamówienia: {{ $invoice_id }}</p>
                                <p><i class="fas fa-hourglass-start"></i> Przyjęto zamówienie: {{ $order_time }} </p>
                                <p><i class="fas fa-hourglass-end"></i>Szacowany czas dostawy zamówienia: {{ $delivery_time }} </p>
                            @endif
                        @else
                            <p>Błąd</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection