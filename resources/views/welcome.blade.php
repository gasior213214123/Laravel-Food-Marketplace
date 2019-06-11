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
    <script src="{{ asset('js/tether.min.js') }}" defer></script>
    <script src="{{ asset('js/toolkit.js') }}" defer></script>
    <script src="{{ asset('js/application.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">  

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/browser-startup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/application-startup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toolkit-startup.css') }}" rel="stylesheet">


</head>
<body>
    <div class="stage-shelf stage-shelf-right hidden" id="sidebar">
      <ul class="nav nav-bordered nav-stacked flex-column">
        <li class="nav-header">Restauracje.pl</li>
        @if (Route::has('login'))
            @auth
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/home') }}">Strona główna</a>
                </li>
            @else
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('login') }}">Zaloguj</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Zarejestruj</a>
                </li>
            @endauth
        @endif
        <li class="nav-header">O nas</li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/home') }}">Kontakt</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/home') }}">Dołącz do nas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/home') }}">Regulamin</a>
        </li>
      </ul>
    </div>

    <div class="stage" id="stage">
        <div class="block-inverse block-fill-height app-header" style="background-image: url('{{asset('storage/site/welcome/welcome-4.jpg')}}');background-repeat: no-repeat; background-size: 100%">
            <div class="container static-top app-navbar">
                <nav class="navbar navbar-transparent navbar-padded navbar-toggleable-sm">
                    <button class="navbar-toggler navbar-toggler-right hidden-md-up" type="button" data-target="#stage" data-toggle="stage" data-distance="-250">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand mr-auto" href="{{ url('/home') }}">
                        <strong style="background: #c01b1a; padding: 12px; border-radius: 10px; color: #FFF;"><img src="{{ asset('storage/site/restaurant_navbar.png')}}">  Restauracje.pl</strong>
                    </a>
                    <div class="hidden-sm-down text-uppercase">
                        <ul class="navbar-nav">
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{ url('/home') }}">Strona główna</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                      <a class="nav-link active" href="{{ route('login') }}">Zaloguj</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">Zarejestruj</a>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container flex" style="margin-top: 5%">
                <form action="{{ url('/citysearch') }}">
                    <div class="row">
                        <div class="col">
                            <div class="col-sm-5 offset-sm-6">
                                <h1 class="block-titleData frequency">Zamów jedzenie online</h1>
                                <p class="lead mb-4 text-muted">Podaj adres i znajdź restauracje w Twojej okolicy</p>
                                <p><input class="form-control" id="autocomplete" type="text" name="adress" placeholder="Podaj swój adres dostawy" onFocus="geolocate()"></p>
                                <input type="submit" class="submit_btn"  value="ZNAJDŹ RESTAURACJE">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="block block-secondary app-block-marketing-grid">
            <div class="container text-xs-center">
                <div class="row mb-5">
                    <div class="col-xs-10 offset-xs-1 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <h6 class="text-muted text-uppercase mb-2">Jak to działa?</h6>
                        <h3  class="mb-4">Aby zamówić jedzenie musisz wykonać trzy proste kroki</h3>
                    </div>
                </div>
                <div class="row app-marketing-grid">
                    <div class="col-md-4 px-4 mb-5">
                        <img class="mb-1" src="{{ asset('/storage/site/welcome/welcome-2.svg')}}">
                        <p><strong>Wybierz restauracje i zamów.</strong></p>
                    </div>
                    <div class="col-md-4 px-4 mb-5">
                        <img class="mb-1" src="{{ asset('/storage/site/welcome/welcome-1.svg')}}">
                        <p><strong>Wybierz rodzaj płatności i zapłać.</strong></p>
                    </div>
                    <div class="col-md-4 px-4 mb-5">
                        <img class="mb-1" src="{{ asset('/storage/site/welcome/welcome-3.svg')}}">
                        <p><strong>Czekaj na dostawe.</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block block-inverse app-high-praise" style=" background-image: url('{{asset('storage/site/welcome/welcome-5.jpg')}}');">
        <div class="container">
            <div class="row app-align-center py-3">
                <div class="col-sm-5 push-sm-7 py-5">
                    <h6 class="text-muted text-uppercase mb-2">Innowacja</h6>
                    <h3 class="mb-4">“Strona Restauracje.pl to najbardziej innowacyjna strona zrzeszająca restauracje z całej Polski”</h3>
                    <p class="mb-4 text-muted">Szczepan Lis, Założyciel Restauracje.pl</p>
                </div>
            </div>
        </div>
    </div>
    <div class="block block-secondary app-iphone-block">
        <div class="container">
            <div class="row app-align-center">
                <div class="col-sm-5 hidden-sm-down">
                    <img class="app-iphone" src="{{ asset('storage/site/welcome/welcome-6.jpg') }}" style="width: 100%;">
                </div>
                <div class="col-md-6 offset-md-1 col-sm-12 offset-sm-0">
                    <h6 class="text-muted text-uppercase">Kochasz dobre jedzenie? </h6>
                    <h3>Zamawiaj jedzenie z dowozem do domu tylko przez Internet!</h3>
                    <p class="lead mb-4">Szukasz restauracji, która oferuje jedzenie na wynos? Restauracje.pl to jeden z największych w Polsce serwisów do zamawiania jedzenia online. Wszystkie restauracje dostępne na platformie Restauracje.pl oferują jedzenie na dowóz, dzięki czemu możesz delektować się smakiem ulubionej pizzy, sushi, kebaba, pierogów i innych potraw gdziekolwiek jesteś: w domu, w pracy, podczas imprezy lub spotkania ze znajomymi.</p>
                    <div class="row hidden-md-down">
                        <div class="col-sm-6 mb-3">
                            <h5>Masz ochotę na więcej?</h5>
                            <p>Informacje na temat serwisu Restauracje.pl znajdziesz na Blogu Restauracje.pl <a href="#" class="text-primary">Dowiedz się więcej</a></p>
                        </div>
                        <div class="col-sm-6">
                            <h5>Promocje!</h5>
                            <p>Chcesz jeść jeszcze taniej? Sprawdź wspaniałe rabaty i zniżki od naszych Partnerów. <a href="#" class="text-primary">Dowiedz się więcej</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--                       SCRIPTS                                     -->
    <script>
        var autocomplete;

        function initAutocomplete() {
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']});
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }
        }
    </script>   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDznFOleVsbuYZfiovUgwxB-g3_9ghFlaI&libraries=places&callback=initAutocomplete"
    async defer>
    </script>
</body>
<footer>
    <div class="block block-inverse app-footer" style="background-color: #262F36;">
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
