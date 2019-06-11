@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">            
                <div class="card-header">Wyniki wyszukiwania</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($search_results == null)
                        Brak rezultatów
                    @else
                        @foreach ($search_results as $rst)
                            <div class="col-xs-8 col-xs-offset-2 slide-row row">
                                <div class="col-xs-1">
                                    <img src="{{ url('restaurant-avatar/' . $rst->id . '/150') }}" alt="Image" class="thumbnail rounded-circle img-responsive">
                                </div>
                                <div class="col-xs-7" style="padding-left: 15px;">
                                    <h4>{{ $rst->name}}
                                    @switch(restaurant_rate_stats($rst->id)['star_display'])
                                        @case('0')
                                            <i class="far fa-star star"></i>
                                            <i class="far fa-star star"></i>
                                            <i class="far fa-star star"></i>
                                            <i class="far fa-star star"></i>
                                            <i class="far fa-star star"></i>
                                            @break

                                        @case('0.5')
                                            <i class="fas fa-star-half-alt star"></i>
                                            <i class="far fa-star star"></i>
                                            <i class="far fa-star star"></i>
                                            <i class="far fa-star star"></i>
                                            <i class="far fa-star star"></i>
                                            @break

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
                                    <p>
                                        {{ $rst->description}}
                                    </p>
                                    <p>
                                        <i class="fas fa-unlock-alt"></i> Od {{ $rst->open_from }} | <i class="fas fa-lock"></i> Do {{ $rst->open_till }} | <i class="far fa-clock"></i> ok. {{ $rst->avg_wait }} | <i class="fas fa-building"></i> {{ $rst->city }}
                                    </p>
                                </div>
                                <div class="slide-footer">
                                    <span class="float-right buttons">
                                        <a href="{{ url('/restaurants/' . $rst->id) }}"><button  class="btn btn-sm btn-danger" style="Colour: #b30000"><i class="fa fa-fw fa-shopping-cart"></i> Przejdź</button></a>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Szukaj</div>
                <div class="card-body">
                    <form method="GET" action="{{ url('/search') }}" class="navbar-form">
                        <div id="custom-search" class="col">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" placeholder="Wyszukaj restauracji"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-sm" type="button">
                                        <i class="fas fa-search"></i> 
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="sort-col">
                            <h5 style="line-height: 2;">Miasto</h5>  

                            <input class="form-check-input time" id="Kielce" type="radio" name="city" value="Kielce" checked hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="Kielce">Kielce</label>

                            <input class="form-check-input time" id="Krakow" type="radio" name="city" value="Krakow" hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="Krakow">Kraków</label>

                            <input class="form-check-input time" id="Warszawa" type="radio" name="city" value="Warszawa" hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="Warszawa">Warszawa</label>

                            <input class="form-check-input time" id="Szczecin" type="radio" name="city" value="Szczecin" hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="Szczecin">Szczecin</label> 

                            <input class="form-check-input time" id="Wroclaw" type="radio" name="city" value="Wroclaw" hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="Wroclaw">Wrocław</label>

                            <input class="form-check-input time" id="Lublin" type="radio" name="city" value="Lublin" hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="Lublin">Lublin</label>
                        </div>
                        <div class="sort-col">
                            <h5 style="line-height: 2;">Kuchnie świata</h5>  
                            <div class="checkbox-hidden">
                            <input class="form-check-input time" type="checkbox" name="select-all" id="select-all" checked hidden>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" data-wow-delay="0.7s" aria-pressed="true" for="select-all">Wszystkie</label>
                            </div>

                            <div class="checkbox-hidden">
                            <input class="form-check-input time" type="checkbox" name="type[]" value="polish" id="polish" checked hidden>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" data-wow-delay="0.7s" aria-pressed="true" for="polish">Polska</label>
                            </div>

                            <div class="checkbox-hidden">
                            <input class="form-check-input time" type="checkbox" name="type[]" value="turkish" id="turkish" checked hidden>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" data-wow-delay="0.7s" aria-pressed="true" for="turkish">Turecka</label>
                            </div>

                            <div class="checkbox-hidden">
                            <input class="form-check-input time" type="checkbox" name="type[]" value="italian" id="italian" checked hidden>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" data-wow-delay="0.7s" aria-pressed="true" for="italian">Włoska</label>
                            </div>

                            <div class="checkbox-hidden">
                            <input class="form-check-input time" type="checkbox" name="type[]" value="chinese" id="chinese" checked hidden>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" data-wow-delay="0.7s" aria-pressed="true" for="chinese">Chińska</label>
                            </div>

                            <div class="checkbox-hidden">
                            <input class="form-check-input time" type="checkbox" name="type[]" value="indian" id="indian" checked hidden>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" data-wow-delay="0.7s" aria-pressed="true" for="indian">Indyjska</label>
                            </div>

                            <div class="checkbox-hidden">
                            <input class="form-check-input time" type="checkbox" name="type[]" value="american" id="american" checked hidden>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" data-wow-delay="0.7s" aria-pressed="true" for="american">Amerykańska</label>
                            </div>
                        </div>
                        <div class="sort-col">
                            <h5 style="line-height: 2;">Opinie</h5>
                            <div class="stars">
                                <input type="radio" name="star" class="star-1" id="star-1" value="1"/>
                                <label class="star-1" for="star-1">1</label>
                                <input type="radio" name="star" class="star-2" id="star-2" value="2" />
                                <label class="star-2" for="star-2">2</label>
                                <input type="radio" name="star" class="star-3" id="star-3" value="3" />
                                <label class="star-3" for="star-3">3</label>
                                <input type="radio" name="star" class="star-4" id="star-4" value="4" />
                                <label class="star-4" for="star-4">4</label>
                                <input type="radio" name="star" class="star-5" id="star-5" value="5" />
                                <label class="star-5" for="star-5">5</label>
                                <span></span>
                            </div>
                        <div class="sort-col">
                            <h5 style="line-height: 2;">Czas dojazdu</h5>  

                            <input class="form-check-input time" id="45-min" type="radio" name="wait_time" value="45" hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="45-min">45 min</label>

                            <input class="form-check-input time" id="60-min" type="radio" name="wait_time" value="60" hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="60-min">60 min</label>

                            <input class="form-check-input time" id="75-min" type="radio" name="wait_time" value="75" hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="75-min">75 min</label>

                            <input class="form-check-input time" id="90-min" type="radio" name="wait_time" value="90" checked hidden/>
                            <label class="btn btn-outlined btn-theme btn-sm btn-custom" for="90-min">90 min</label> 
                        </div>
                        <div class="sort-col" style="padding-top: 5%">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-outlined btn-theme btn-sm btn-custom" style="color: #FFF;background: #b30000;border-color: #b30000;line-height:40px; ">szukaj</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
