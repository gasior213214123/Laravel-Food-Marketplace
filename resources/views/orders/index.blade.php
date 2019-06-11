@extends('layouts.app')

@section('content')
@include('layouts.user')
                <div class="tab-pane active" id="Orders" role="tabpanel">
                    <hr>
                    <div class="form-group">
                        <div class="table-responsive col-xs-12">
                            @if($orders->count() == 0)
                                <p>Brak zamówień</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table" data-sort="table">
                                        <thead>
                                            <tr>
                                            <th>Numer</th>
                                            <th>Zamówienie</th>
                                            <th>Koszt(zł)</th>
                                            <th>Zapłacone</th>
                                            <th>Dostarczone</th>
                                            <th>Ocena</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->title }}</td>
                                                    <td>{{ $order->price }}</td>
                                                    <td>
                                                        @if ($order->payment_status == 'Completed')
                                                            Tak
                                                        @else
                                                            Nie
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($order->delivery == 1)
                                                            Tak
                                                        @else
                                                            Nie
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($order->payment_status == 'Completed')
                                                            @if ($order->delivery == 1)
                                                                @if (invoice_has_rate($order->id) == false)
                                                                    <a href="{{ url('orders/' . $order->id . '/rate/create') }}"><button class="btn btn-success">Oceń <i class="fas fa-star star"></i></button></a>
                                                                @else
                                                                    {{ invoice_has_rate($order->id) }} <i class="fas fa-star star"></i>
                                                                @endif
                                                            @else
                                                                Nie dostarczone
                                                            @endif
                                                        @else
                                                            Nie zapłacone
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection