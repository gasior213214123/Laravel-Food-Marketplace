@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">Ranking</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs">
                        <li class="active nav-item"><a class="nav-link active" data-toggle="tab" href="#All" role="tab"><i class="fas fa-trophy"></i> Wszystkie</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Kielce" role="tab"><i class="fas fa-map-marker"></i> Kielce</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Krakow" role="tab"><i class="fas fa-map-marker"></i> Kraków</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Warszawa" role="tab"><i class="fas fa-map-marker"></i> Warszawa</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Szczecin" role="tab"><i class="fas fa-map-marker"></i> Szczecin</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Wroclaw" role="tab"><i class="fas fa-map-marker"></i> Wrocław</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Lublin" role="tab"><i class="fas fa-map-marker"></i> Lublin</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="All" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Nazwa</th>
                                        <th>Miasto</th>
                                        <th>Kuchnia</th>
                                        <th>Średnia ocena</th>
                                        <th>Ilość ocen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sort as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td><a href="{{ url('/restaurants/' . $item['id']) }}">{{ $item['name'] }}
                                                    @switch($item['star_display'])
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
                                                    @endswitch</a>
                                                </td>
                                                <td>{{ $item['city'] }}</td>
                                                <td>
                                                    @if ($item['type'] == 'polish')
                                                        Polska
                                                    @elseif ($item['type'] == 'turkish')
                                                        Turecka
                                                    @elseif ($item['type'] == 'american')
                                                        Amerykańska
                                                    @elseif ($item['type'] == 'indian')
                                                        Indyjska
                                                    @elseif ($item['type'] == 'italian')
                                                        Włoska
                                                    @elseif ($item['type'] == 'chinese')
                                                        Chińska
                                                    @else
                                                        Błąd
                                                    @endif
                                                </td>
                                                <td>
                                                @if ($item['avg_rate']  == -10)
                                                    brak ocen
                                                @else
                                                    {{ round($item['avg_rate'], 2) }}
                                                @endif
                                                </td>
                                                <td>{{ $item['count'] }}</td>
                                            </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="Kielce" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Nazwa</th>
                                        <th>Miasto</th>
                                        <th>Kuchnia</th>
                                        <th>Średnia ocena</th>
                                        <th>Ilość ocen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sort as $key => $item)
                                            @if ($item['city'] == 'Kielce')
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><a href="{{ url('/restaurants/' . $item['id']) }}">{{ $item['name'] }}
                                                        @switch($item['star_display'])
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
                                                        @endswitch</a>
                                                    </td>
                                                    <td>{{ $item['city'] }}</td>
                                                    <td>
                                                        @if ($item['type'] == 'polish')
                                                            Polska
                                                        @elseif ($item['type'] == 'turkish')
                                                            Turecka
                                                        @elseif ($item['type'] == 'american')
                                                            Amerykańska
                                                        @elseif ($item['type'] == 'indian')
                                                            Indyjska
                                                        @elseif ($item['type'] == 'italian')
                                                            Włoska
                                                        @elseif ($item['type'] == 'chinese')
                                                            Chińska
                                                        @else
                                                            Błąd
                                                        @endif
                                                    </td>
                                                    <td>
                                                    @if ($item['avg_rate']  == -10)
                                                        brak ocen
                                                    @else
                                                        {{ round($item['avg_rate'], 2) }}
                                                    @endif
                                                    </td>
                                                    <td>{{ $item['count'] }}</td>
                                                </tr> 
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="Krakow" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Nazwa</th>
                                        <th>Miasto</th>
                                        <th>Kuchnia</th>
                                        <th>Średnia ocena</th>
                                        <th>Ilość ocen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sort as $key => $item)
                                            @if ($item['city'] == 'Krakow')
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><a href="{{ url('/restaurants/' . $item['id']) }}">{{ $item['name'] }}
                                                        @switch($item['star_display'])
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
                                                        @endswitch</a>
                                                    </td>
                                                    <td>{{ $item['city'] }}</td>
                                                    <td>
                                                        @if ($item['type'] == 'polish')
                                                            Polska
                                                        @elseif ($item['type'] == 'turkish')
                                                            Turecka
                                                        @elseif ($item['type'] == 'american')
                                                            Amerykańska
                                                        @elseif ($item['type'] == 'indian')
                                                            Indyjska
                                                        @elseif ($item['type'] == 'italian')
                                                            Włoska
                                                        @elseif ($item['type'] == 'chinese')
                                                            Chińska
                                                        @else
                                                            Błąd
                                                        @endif
                                                    </td>
                                                    <td>
                                                    @if ($item['avg_rate']  == -10)
                                                        brak ocen
                                                    @else
                                                        {{ round($item['avg_rate'], 2) }}
                                                    @endif
                                                    </td>
                                                    <td>{{ $item['count'] }}</td>
                                                </tr> 
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="Warszawa" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Nazwa</th>
                                        <th>Miasto</th>
                                        <th>Kuchnia</th>
                                        <th>Średnia ocena</th>
                                        <th>Ilość ocen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sort as $key => $item)
                                            @if ($item['city'] == 'Warszawa')
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><a href="{{ url('/restaurants/' . $item['id']) }}">{{ $item['name'] }}
                                                        @switch($item['star_display'])
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
                                                        @endswitch</a>
                                                    </td>
                                                    <td>{{ $item['city'] }}</td>
                                                    <td>
                                                        @if ($item['type'] == 'polish')
                                                            Polska
                                                        @elseif ($item['type'] == 'turkish')
                                                            Turecka
                                                        @elseif ($item['type'] == 'american')
                                                            Amerykańska
                                                        @elseif ($item['type'] == 'indian')
                                                            Indyjska
                                                        @elseif ($item['type'] == 'italian')
                                                            Włoska
                                                        @elseif ($item['type'] == 'chinese')
                                                            Chińska
                                                        @else
                                                            Błąd
                                                        @endif
                                                    </td>
                                                    <td>
                                                    @if ($item['avg_rate']  == -10)
                                                        brak ocen
                                                    @else
                                                        {{ round($item['avg_rate'], 2) }}
                                                    @endif
                                                    </td>
                                                    <td>{{ $item['count'] }}</td>
                                                </tr> 
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="Szczecin" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Nazwa</th>
                                        <th>Miasto</th>
                                        <th>Kuchnia</th>
                                        <th>Średnia ocena</th>
                                        <th>Ilość ocen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sort as $key => $item)
                                            @if ($item['city'] == 'Szczecin')
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><a href="{{ url('/restaurants/' . $item['id']) }}">{{ $item['name'] }}
                                                        @switch($item['star_display'])
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
                                                        @endswitch</a>
                                                    </td>
                                                    <td>{{ $item['city'] }}</td>
                                                    <td>
                                                        @if ($item['type'] == 'polish')
                                                            Polska
                                                        @elseif ($item['type'] == 'turkish')
                                                            Turecka
                                                        @elseif ($item['type'] == 'american')
                                                            Amerykańska
                                                        @elseif ($item['type'] == 'indian')
                                                            Indyjska
                                                        @elseif ($item['type'] == 'italian')
                                                            Włoska
                                                        @elseif ($item['type'] == 'chinese')
                                                            Chińska
                                                        @else
                                                            Błąd
                                                        @endif
                                                    </td>
                                                    <td>
                                                    @if ($item['avg_rate']  == -10)
                                                        brak ocen
                                                    @else
                                                        {{ round($item['avg_rate'], 2) }}
                                                    @endif
                                                    </td>
                                                    <td>{{ $item['count'] }}</td>
                                                </tr> 
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="Wroclaw" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Nazwa</th>
                                        <th>Miasto</th>
                                        <th>Kuchnia</th>
                                        <th>Średnia ocena</th>
                                        <th>Ilość ocen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sort as $key => $item)
                                            @if ($item['city'] == 'Wroclaw')
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><a href="{{ url('/restaurants/' . $item['id']) }}">{{ $item['name'] }}
                                                        @switch($item['star_display'])
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
                                                        @endswitch</a>
                                                    </td>
                                                    <td>{{ $item['city'] }}</td>
                                                    <td>
                                                        @if ($item['type'] == 'polish')
                                                            Polska
                                                        @elseif ($item['type'] == 'turkish')
                                                            Turecka
                                                        @elseif ($item['type'] == 'american')
                                                            Amerykańska
                                                        @elseif ($item['type'] == 'indian')
                                                            Indyjska
                                                        @elseif ($item['type'] == 'italian')
                                                            Włoska
                                                        @elseif ($item['type'] == 'chinese')
                                                            Chińska
                                                        @else
                                                            Błąd
                                                        @endif
                                                    </td>
                                                    <td>
                                                    @if ($item['avg_rate']  == -10)
                                                        brak ocen
                                                    @else
                                                        {{ round($item['avg_rate'], 2) }}
                                                    @endif
                                                    </td>
                                                    <td>{{ $item['count'] }}</td>
                                                </tr> 
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="Lublin" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table" data-sort="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Nazwa</th>
                                        <th>Miasto</th>
                                        <th>Kuchnia</th>
                                        <th>Średnia ocena</th>
                                        <th>Ilość ocen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sort as $key => $item)
                                            @if ($item['city'] == 'Lublin')
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><a href="{{ url('/restaurants/' . $item['id']) }}">{{ $item['name'] }}
                                                        @switch($item['star_display'])
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
                                                        @endswitch</a>
                                                    </td>
                                                    <td>{{ $item['city'] }}</td>
                                                    <td>
                                                        @if ($item['type'] == 'polish')
                                                            Polska
                                                        @elseif ($item['type'] == 'turkish')
                                                            Turecka
                                                        @elseif ($item['type'] == 'american')
                                                            Amerykańska
                                                        @elseif ($item['type'] == 'indian')
                                                            Indyjska
                                                        @elseif ($item['type'] == 'italian')
                                                            Włoska
                                                        @elseif ($item['type'] == 'chinese')
                                                            Chińska
                                                        @else
                                                            Błąd
                                                        @endif
                                                    </td>
                                                    <td>
                                                    @if ($item['avg_rate']  == -10)
                                                        brak ocen
                                                    @else
                                                        {{ round($item['avg_rate'], 2) }}
                                                    @endif
                                                    </td>
                                                    <td>{{ $item['count'] }}</td>
                                                </tr> 
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
