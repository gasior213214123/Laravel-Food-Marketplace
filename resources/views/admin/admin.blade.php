@extends('layouts.app')

@section('content')<div class="container bootstrap snippet bg-row">
    <br>
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-sm-8">
            <h1>Panel Administracyjny</h1>
        </div>
        <div class="col-sm-4">
            <h1>
            <i class="fas fa-user-tie"></i>{{ $user->name}}</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
                <img src="{{ url('storage/site/no_logo_restaurant.png') }}" class="avatar rounded-circle img-thumbnail img-responsive" alt="avatar">
            </div><br>
            <ul class="list-group">
                <li class="list-group-item"><i class="fas fa-chart-line"></i> Statystyki strony</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Ilość Restauracji</strong></span> {{ $dashboard['restaurants']->count() }}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Ilość użytkowników</strong></span> {{ $dashboard['users']->count() }}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Ilość zamówień</strong></span> {{ $dashboard['invoices']->count() }}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Ilość ocen</strong></span> {{ $dashboard['rates']->count() }}</li>
            </ul> 
            <br>
            <br>
        </div>
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active nav-item"><a class="nav-link active" data-toggle="tab" href="#Users" role="tab"><i class="fas fa-users-cog"></i> Użytkownicy</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Restaurants" role="tab"><i class="fas fa-utensils"></i> Restauracje</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Orders" role="tab"><i class="fas fa-receipt"></i> Zamówienia</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Rates" role="tab"><i class="fas fa-star"></i> Oceny</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="Users" role="tabpanel">
                    <hr>
                    <div class="form-group">
                        <div class="table-responsive col-xs-12">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>Imię</th>
                                        <th>Miasto</th>
                                        <th>Email</th>
                                        <th>Weryfikacja</th>
                                        <th>Rola</th>
                                        <th>Usuń</th>
                                        </tr>
                                    </thead>
                                    @foreach ($dashboard['users'] as $user)
                                        <tbody> 
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->city }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->verified == 1)
                                                        Zweryfikowany
                                                    @else
                                                        Niezweryfikowany
                                                    @endif
                                                </td>
                                                <td>{{ $user->occupation }}</td>
                                                <td>      
                                                    @if ($user-> occupation !== 'Admin')
                                                        <form method="POST" action="{{ url('/users/' . $user->id . '/delete') }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE')}}
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Na pewno chcesz usunąć użytkownika?');"><i class="fas fa-trash-alt"></i></button>
                                                        </form>  
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach 
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="tab-pane" id="Restaurants" role="tabpanel">
                    <hr>
                    <div class="form-group">
                        <div class="table-responsive col-xs-12">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>Nazwa</th>
                                        <th>Właściciel</th>
                                        <th>Miasto</th>
                                        <th>Adres</th>
                                        <th>Opis</th>
                                        <th>Czas otwarcia</th>
                                        </tr>
                                    </thead>
                                    @foreach ($dashboard['restaurants'] as $restaurant)
                                        <tbody> 
                                            <tr>
                                                <td>{{ $restaurant->id }}</td>
                                                <td>{{ $restaurant->name }}</td>
                                                <td>{{ user_name($restaurant->worker_id) }}</td>
                                                <td>{{ $restaurant->city }}</td>
                                                <td>{{ $restaurant->adress }}</td>                                                <td>{{ $restaurant->description }}</td>
                                                <td>{{ $restaurant->open_from }} - {{ $restaurant->open_till }}</td>
                                                <td>      
                                                    <form method="POST" action="{{ url('/restaurants/' . $restaurant->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Na pewno chcesz usunąć restauracje?');"><i class="fas fa-trash-alt"></i></button>
                                                    </form>  
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach 
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="tab-pane" id="Orders" role="tabpanel">
                    <hr>
                    <div class="form-group">
                        <div class="table-responsive col-xs-12">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>Tytuł</th>
                                        <th>Imię użytkownika</th>
                                        <th>Nazwa restauracji</th>
                                        <th>Cena</th>
                                        <th>Miasto</th>
                                        <th>Zapłacone</th>
                                        <th>Dostarczone</th>
                                        </tr>
                                    </thead>
                                    @foreach ($dashboard['invoices'] as $invoice)
                                        <tbody> 
                                            <tr>
                                                <td>{{ $invoice->id }}</td>
                                                <td>{{ $invoice->title }}</td>
                                                <td>
                                                    @if ($invoice->user_id == null)
                                                        gość
                                                    @else
                                                        {{ user_name($invoice->user_id) }}
                                                    @endif
                                                </td>
                                                <td>{{ restaurant_name($invoice->restaurant_id) }}</td>
                                                <td>{{ $invoice->price }}</td>
                                                <td>{{ $invoice->city }}</td>
                                                <td>
                                                    @if ($invoice->payment_status == 'Completed')
                                                        Tak
                                                    @else
                                                        Nie
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($invoice->delivery == 1)
                                                        Tak
                                                    @else
                                                        Nie
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach 
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="tab-pane" id="Rates" role="tabpanel">
                    <hr>
                    <div class="form-group">
                        <div class="table-responsive col-xs-12">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>ID zamówienia</th>
                                        <th>Imię użytkownika</th>
                                        <th>Nazwa restauracji</th>
                                        <th>Ocena</th>
                                        <th>Komentarz</th>
                                        <th>Usuń</th>
                                        </tr>
                                    </thead>
                                    @foreach ($dashboard['rates'] as $rate)
                                        <tbody> 
                                            <tr>
                                                <td>{{ $rate->id }}</td>
                                                <td>{{ $rate->invoice_id }}</td>
                                                <td>{{ user_name($rate->user_id) }}</td>
                                                <td>{{ restaurant_name($rate->restaurant_id) }}</td>
                                                <td>{{ $rate->rate }} <i class="fas fa-star star"></i></td>
                                                <td>{{ $rate->comment }}</td>
                                                <td>      
                                                    <form method="POST" action="{{ url('/rates/' . $rate->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Na pewno chcesz usunąć ocenę?');"><i class="fas fa-trash-alt"></i></button>
                                                    </form>  
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach 
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection