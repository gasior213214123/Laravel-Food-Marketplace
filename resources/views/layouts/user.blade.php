<div class="container bootstrap snippet bg-row">
    <br>
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-sm-8">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="col-sm-4">
            <h1>
            <i class="fas fa-user-tie"></i>                        
            @if ($user->occupation == 'Client')
                Użytkownik
            @elseif ($user->occupation == 'Admin')
                Administrator
            @else
                Pracownik
            @endif
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
                <img src="{{ url('storage/site/avatar.jpg') }}" class="avatar rounded-circle img-thumbnail" alt="avatar">
            </div><br>
            <ul class="list-group">
                <li class="list-group-item"><i class="fas fa-chart-line"></i> Statystyki</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Ilość zamówień</strong></span> {{ user_rate_stats($user->id)['invoice_count'] }}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Ilość ocen</strong></span> {{ user_rate_stats($user->id)['count'] }}</li><li class="list-group-item text-right"><span class="pull-left"><strong>Najczęstsza ocena</strong></span> 
                @if (user_rate_stats($user->id)['common_rate'] == 0)
                    Brak ocen
                @else
                    {{ user_rate_stats($user->id)['common_rate'] }}<i class="fas fa-star star"></i>
                @endif
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Średnia ocen</strong></span>
                                @switch(user_rate_stats($user->id)['star_display'])
                                    @case('1')
                                        <i class="fas fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        @break

                                    @case('1.5')
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star-half-alt star"></i>
                                        <i class="far fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        @break

                                    @case('2')
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        @break

                                    @case('2.5')
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star-half-alt star"></i>
                                        <i class="far fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        @break

                                    @case('3')
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        @break

                                    @case('3.5')
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star-half-alt star"></i>
                                        <i class="far fa-star star"></i>
                                        @break

                                    @case('4')
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="far fa-star star"></i>
                                        @break

                                    @case('4.5')
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star-half-alt star"></i>
                                        @break

                                    @case('5')
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        <i class="fas fa-star star"></i>
                                        @break

                                    @case('-10')
                                        Brak ocen
                                        @break
                                @endswitch
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Data dołaczenia</strong></span> {{ $user->created_at }}</li>
            </ul> 
            <br>
            <br>
        </div>
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active nav-item"><a class="nav-link" href="{{ url('/users/' . $user->id) }}" role="tab"><i class="far fa-id-card"></i> Dane osobowe</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/users/' . $user->id . '/edit') }}" role="tab"><i class="fas fa-user-edit"></i> Edytuj swoje dane</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/users/' . $user->id . '/orders') }}" role="tab"><i class="fas fa-receipt"></i> Zamówienia {{ $user->orders()->count() }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/users/' . $user->id . '/favourites') }}" role="tab"><i class="fas fa-heart"></i> Ulubione restauracje {{ $user->favourites()->count() }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/users/' . $user->id . '/rates') }}" role="tab"><i class="fas fa-star"></i> Twoje oceny {{ user_rate_stats($user->id)['count'] }}</a></li>
            </ul>
            <div class="tab-content">