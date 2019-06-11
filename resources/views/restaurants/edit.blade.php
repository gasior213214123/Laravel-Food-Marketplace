@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytuj</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/restaurants/' . $restaurant->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <label for="">Avatar</label>
                                    <input type="file" name="avatar" class="form-control" placeholder="Wybierz plik">

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="">Nazwa restauracji</label>
                                    <input type="text" name="name" class="form-control" value="{{ $restaurant->name }}" placeholder="Nazwa restauracji">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="">Miasto</label>
                                    <input type="text" name="city" class="form-control" value="{{ $restaurant->city }}" placeholder="Wpisz miato restauracji">

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('adress') ? ' has-error' : '' }}">
                                    <label for="">Adres</label>
                                    <input type="text" name="adress" class="form-control" value="{{ $restaurant->adress }}" placeholder="Wpisz adres">

                                    @if ($errors->has('adress'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('adress') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('avg_wait') ? ' has-error' : '' }}">
                                    <label for="">Średni czas oczekiwania</label>
                                    <input type="number" name="avg_wait" class="form-control" value="{{ $restaurant->avg_wait }}" placeholder="Wpisz średni czas oczekiwania">

                                    @if ($errors->has('avg_wait'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('avg_wait') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('open_from') ? ' has-error' : '' }}">
                                    <label for="">Otwarte od</label>
                                    <input type="text" name="open_from" class="form-control" value="{{ $restaurant->open_from }}" placeholder="Otwarte od">

                                    @if ($errors->has('open_from'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('open_from') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('open_till') ? ' has-error' : '' }}">
                                    <label for="">Otwarte do</label>
                                    <input type="text" name="open_till" class="form-control" value="{{ $restaurant->open_till }}" placeholder="Otwarte do">

                                    @if ($errors->has('open_till'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('open_till') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="">Rodzaje dań(Pizza, pierogi, kebab itd)</label>
                                    <input type="text" name="description" class="form-control" value="{{ $restaurant->description }}" placeholder="Pizza, Kebab">

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <label for="type">Typ</label>
                                    <select class="form-control" id="type" type="text" class="form-control" name="type">
                                        <option value="polish">Polska</option>
                                        <option value="turkish">Turecka</option>
                                        <option value="american">Amerykańska</option>
                                        <option value="chinese">Chińska</option>
                                        <option value="indian">Indyjska</option>
                                        <option value="italian">Włoska</option>
                                    </select>
                            </div>
                        </div> 
                        <div class="row" style="margin-top:20px;">
                            <div class="col-sm-10 col-sm-offset-1">
                                <button type="submit" class="btn btn-primary btn-sm float-right">Zapisz zmiany</button>
                            </div>
                        </div>
                    </form>
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
                        <p><a  href="{{ url('/restaurants/' . $restaurant->id . '/info') }}" class="btn btn-outlined btn-theme btn-lg btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-question-circle"></i> Informacje</a></p>
                        <p><a  href="{{ url('restaurants/' . $restaurant->id . '/rates') }}"a class="btn btn-outlined btn-theme btn-lg btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-thumbs-up"></i> Opinie</a></p>
                        @if (Auth::check() && $restaurant->worker_id == Auth::id())          
                            <p><a  href="{{ url('/restaurants/' . $restaurant->id . '/edit' ) }}" class="btn btn-outlined btn-theme btn-lg btn-custom btn-activated btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-edit"></i> Edytuj restauracje</a></p>          
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
