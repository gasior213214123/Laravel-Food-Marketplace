<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Gasior">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('storage/site/restaurant_icon.png') }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
          
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/browser.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">  

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/browser-startup.css') }}" rel="stylesheet">
</head>
<body>
    <div id="wrapper" class="animate">
        <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
            <span class="navbar-toggler-icon leftmenutrigger"></span>
            <a class="navbar-brand" href="{{ url('home') }}" style="font-family: sans-serif;"><img src="{{ url('storage/site/restaurant_navbar.png') }}"> Restauracje.pl</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ml-md-auto d-md-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/cart') }}"><i class="fas fa-cart-plus"></i>Koszyk {{ Cart::count() }} </a>
                </li>
            </ul>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav animate side-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('users/' . Auth::id()) }}"><i class="fas fa-user"></i> {{ Auth::user()->name }} <i class="fas fa-user shortmenu animate"></i></a>
                        </li>
                        @if (is_user_worker() == True)
                            @if (user_restaurant() == false)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('restaurants/create') }}"><i class="fas fa-utensils"></i> Stwórz Restauracje <i class="fas fa-utensils shortmenu animate"></i></a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('restaurants/' . user_restaurant()->id) }}" title="Restaurant"><i class="fas fa-utensils"></i> {{ user_restaurant()->name }} <i class="fas fa-utensils shortmenu animate"></i></a>
                                </li>
                            @endif
                        @endif
                        @if (user_possible_rates() != null)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/users/' . Auth::id() . '/orders') }}"><i class="fas fa-receipt"></i> Oceń {{ user_possible_rates() }} zamówienia<i class="fas fa-receipt shortmenu animate"> {{ user_possible_rates() }}</i></a>
                            </li> 
                        @endif
                        @if (Auth::user()->occupation == 'Admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/dashboard') }}"><i class="fas fa-toolbox"></i> Panel administratora<i class="fas fa-toolbox shortmenu animate"></i></a>
                                </li> 
                        @endif   
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('rates/ranking') }}"><i class="fas fa-trophy"></i> Ranking restauracji <i class="fas fa-trophy shortmenu animate"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-md-auto d-md-flex">
                    @if (Auth::check() && Unfinished_Orders()['name'] != null)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/restaurants/' . Unfinished_Orders()['restaurant'] . '/orders') }}"><i class="fas fa-truck"></i> Zamówienia {{ Unfinished_Orders()['name'] }}</a>
                        </li>
                    @endif
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>{{ __('Zaloguj') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>{{ __('Zarejestruj') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>{{ __('Wyloguj') }} 
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer>
    <div class="block block-inverse app-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-5">
                    <ul class="list-unstyled list-spaced">
                        <li class="mb-2"><h6 class="text-uppercase" style="color:white">Informacja</h6></li>
                        <li class="text-muted">
                        Restauracje.pl<br>
                        ul. Kazimierza Wielkiego 29/19 <br>
                        25-633 Kielce<br>
                        Polska<br>
                        Tel.: 000 333 000<br>
                        Mail: <a href="mailto: Szczepan.lis@gmail.com">Szczepan.lis@Restauracje.pl</a>.
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 offset-md-1 mb-5">
                    <ul class="list-unstyled list-spaced">
                    <li class="mb-2"><h6 class="text-uppercase" style="color:white">Restauracje.pl</h6></li>
                    <li class="text-muted">Obsługa klienta</li>
                    <li class="text-muted">Polecane restauracje</li>
                    <li class="text-muted">Oferty pracy</li>
                    <li class="text-muted">Prasa</li>
                    <li class="text-muted">Regulamin</li>
                    <li class="text-muted">Promocje</li>
                    <li class="text-muted">Polityka prywatności</li>
                    </ul>
                </div>
                <div class="col-md-2 mb-5">
                    <ul class="list-unstyled list-spaced">
                        <li class="mb-2"><h6 class="text-uppercase" style="color:white">Miasta</h6></li>
                        <li class="text-muted">Warszawa</li>
                        <li class="text-muted">Kraków</li>
                        <li class="text-muted">Wrocław</li>
                        <li class="text-muted">Kielce</li>
                        <li class="text-muted">Szczecin</li>
                        <li class="text-muted">Rzeszów</li>
                        <li class="text-muted">Poznań</li>
                    </ul>
                </div>
                <div class="col-md-2 mb-5">
                    <ul class="list-unstyled list-spaced">
                        <li class="mb-2"><h6 class="text-uppercase" style="color:white">Media</h6></li>
                        <li class="text-muted"><a href="facebook.com" class="text-muted"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li class="text-muted"><a href="twitter.com" class="text-muted"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li class="text-muted"><a href="youtube.com" class="text-muted"><i class="fab fa-youtube"></i> Youtube</a></li>
                        <li class="text-muted"><a href="instagram.com" class="text-muted"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li class="text-muted"><a href="Restauracje.pl" class="text-muted"><i class="fas fa-pencil-alt"></i> Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>