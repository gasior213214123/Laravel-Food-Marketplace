@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informacje</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h1>Godziny otwarcia:</h1>
                        </div>
                        <div class="col">
                            <h1>Kontakt:</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <p>Poniedzialek:</p>
                            <p>Wtorek:</p>
                            <p>Środa:</p>
                            <p>Czwartek:</p>
                            <p>Piątek:</p>
                            <p>Sobota:</p>
                            <p>Niedziela:</p>
                        </div>
                        <div class="col-md-4">
                            <p>{{ $restaurant->open_from }} - {{ $restaurant->open_till }}</p>
                            <p>{{ $restaurant->open_from }} - {{ $restaurant->open_till }}</p>
                            <p>{{ $restaurant->open_from }} - {{ $restaurant->open_till }}</p>
                            <p>{{ $restaurant->open_from }} - {{ $restaurant->open_till }}</p>
                            <p>{{ $restaurant->open_from }} - {{ $restaurant->open_till }}</p>
                            <p>{{ $restaurant->open_from }} - {{ $restaurant->open_till }}</p>
                            <p>{{ $restaurant->open_from }} - {{ $restaurant->open_till }}</p>
                        </div>
                        <div class="col-md-2">
                            <p>Restauracja:</p>
                            <p>Miasto:</p>
                            <p>Adres:</p>
                            <p>Telefon:</p>
                            <p>Email:</p>
                            <p>Czas oczekiwania:</p>
                        </div>
                        <div class="col-md-4">
                            <p>{{ $restaurant->name }}</p>
                            <p>{{ $restaurant->city }}</p>
                            <p>{{ $restaurant->adress }}</p>
                            <p>{{ find_user($restaurant->worker_id)->phone }}</p>
                            <p>{{ find_user($restaurant->worker_id)->email }}</p>
                            <p>{{ $restaurant->avg_wait }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                            <?php 
                             $address = str_replace(" ", "+", $restaurant->city . $restaurant->adress);
                            ?>
                            <iframe width="100%" height="300" frameborder="0" id="cusmap" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Informacje</div>
                <div class="card-body">
                    <div class="sort-col">
                        <h4 style="text-align: center;">
                            @if (Auth::check())
                                @if ( ! Favourite_restaurants($restaurant->id))    
                                    <form method="POST" action="{{ url('/favourites/' . $restaurant->id ) }}" class="float-left">
                                        {{ csrf_field() }}
                                            <a class="tooltips" data-toggle="tooltip" data-placement="top" title="Add">
                                                <button type="submit" style="border: 0; background: none;">
                                                    <i class="far fa-heart" style="color:#b30000"aria-hidden="true"></i>
                                                </button>
                                            </a>
                                    </form>
                                @else
                                    <form method="POST" action="{{ url('/favourites/' . $restaurant->id ) }}" class="float-left">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}
                                            <a class="tooltips" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <button type="submit" style="border: 0; background: none;">
                                                    <i class="fas fa-heart" style="color:#b30000" aria-hidden="true"></i>
                                                </button>
                                            </a>  
                                    </form>
                                @endif
                            @endif      
                            {{ $restaurant->name }}
                            @switch(restaurant_rate_stats($restaurant->id)['star_display'])
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
                        </h4>
                    </div>
                    <div class="sort-col">
                        <center><img src="{{ url('restaurant-avatar/' . $restaurant->id . '/200') }}" alt="Image" class="img-thumbnail rounded-circle img-responsive" style='width: 100%; object-fit: contain'></center>
                    </div>
                    <div class="sort-col">
                        <br>
                        <p style="text-align: center;">
                            {{ $restaurant->description }}
                        </p>
                        <p style="text-align: center;">
                            <i class="fas fa-unlock-alt"></i> Od {{ $restaurant->open_from }} | <i class="fas fa-lock"></i> Do {{ $restaurant->open_till }} | <i class="far fa-clock"></i> ok. {{ $restaurant->avg_wait }} min | <i class="fas fa-building"></i> {{ $restaurant->city }}
                        </p>
                    </div>
                    <br>
                    <div class="sort-col">     
                        <br>          
                        <p><a  href="{{ url('/restaurants/' . $restaurant->id ) }}" class="btn btn-outlined btn-theme btn-lg btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-book-open"></i> Menu</a></p>
                        <p><a  href="{{ url('/restaurants/' . $restaurant->id . '/info') }}" class="btn btn-outlined btn-theme btn-activated btn-lg btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-question-circle"></i> Informacje</a></p>
                        <p><a  href="{{ url('restaurants/' . $restaurant->id . '/rates') }}"a class="btn btn-outlined btn-theme btn-lg btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-thumbs-up"></i> Opinie</a></p>
                        @if (Auth::check() && $restaurant->worker_id == Auth::id())          
                            <p><a  href="{{ url('/restaurants/' . $restaurant->id . '/edit' ) }}" class="btn btn-outlined btn-theme btn-lg btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-edit"></i> Edytuj restauracje</a></p>          
                            <p><a  href="{{ url('/restaurants/' . $restaurant->id . '/dishes' ) }}" class="btn btn-outlined btn-theme btn-lg btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-utensils"></i> Edytuj menu</a></p>          
                            <p><a  href="{{ url('/restaurants/' . $restaurant->id . '/orders') }}" class="btn btn-outlined btn-theme btn-lg btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-truck"></i> Zamówienia {{ Unfinished_Orders()['name'] }}</a></p>
                            <form method="POST" action="{{ url('/restaurants/' . $restaurant->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}
                                <a class="tooltips" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <button type="submit" onclick="return confirm('Na pewno chcesz usunac restauracje?');" class="btn btn-outlined btn-theme btn-lg btn-custom btn-menu"><i class="fas fa-trash"></i> Usuń z restauracje</button>
                                </a>
                            </form>       
                        @endif       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
