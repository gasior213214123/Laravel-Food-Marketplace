@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Statystyki</div>
                <div class="card-body">
                    <div class="col">
                        @if($rates->count() === 0)
                            <h1 style="text-align: center;">Brak ocen restauracji</h1>
                        @else                    
                        <h1 style="text-align: center;">Statystyki</h1>
                        <div class="row">
                            <div class="col" style="text-align: center;">
                                <div class="rating-block">
                                    <p>Średnia ocena restauracji z {{ $rates->count() }} zamówień</p>
                                    <p class="bold padding-bottom-7">{{ round(restaurant_rate_stats($rates->first()->restaurant_id)->get('avg_rate'), 2) }} <small>/ 5</small></p>
                                    @switch(restaurant_rate_stats($restaurant->id)['star_display'])
                                        @case('0')
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('0.5')
                                            <i class="fas fa-star-half-alt star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('1')
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('1.5')
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star-half-alt star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('2')
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('2.5')
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star-half-alt star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('3')
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('3.5')
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star-half-alt star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('4')
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="far fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('4.5')
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star-half-alt star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('5')
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            <i class="fas fa-star star"  style="font-size: 24px;"></i>
                                            @break

                                        @case('-10')
                                            Brak ocen
                                            @break
                                    @endswitch
                                </div>
                            </div>
                            <div class="col" style="text-align: left;">
                                <div class="rating-block">
                                    <p>Oceny restauracji</p>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">5 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: {{ restaurant_rate_stats($rates->first()->restaurant_id)->get('five_percentage') }}%">
                                                <span class="sr-only">100% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ restaurant_rate_stats($rates->first()->restaurant_id)->get('five_star') }}</div>
                                    </div>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">4 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: {{ restaurant_rate_stats($rates->first()->restaurant_id)->get('four_percentage') }}%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ restaurant_rate_stats($rates->first()->restaurant_id)->get('four_star') }}</div>
                                    </div>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">3 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: {{ restaurant_rate_stats($rates->first()->restaurant_id)->get('three_percentage') }}%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ restaurant_rate_stats($rates->first()->restaurant_id)->get('three_star') }}</div>
                                    </div>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">2 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: {{ restaurant_rate_stats($rates->first()->restaurant_id)->get('two_percentage') }}%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ restaurant_rate_stats($rates->first()->restaurant_id)->get('two_star') }}</div>
                                    </div>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">1 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: {{ restaurant_rate_stats($rates->first()->restaurant_id)->get('one_percentage') }}%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ restaurant_rate_stats($rates->first()->restaurant_id)->get('one_star') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        @endif
                    </div>
                    <div class="col">
                        <h1 style="text-align: center;">Opinie</h1>         
                        <ul class="media-list">
                            @foreach ($rates as $rate)
                                <li class="media">
                                    <a class="float-left" style="padding-right: 5px;">
                                        <img class="media-object rounded-circle" src="{{ url('storage/site/avatar.jpg') }}" alt="circle" class="thumbnail img-responsive">
                                    </a>
                                    <div class="media-body">
                                        <div class="well well-lg">
                                            <p class="reviews float-right rate">{{ $rate->created_at }}</p>
                                            <h4 class="reviews">{{ user_name($rate->user_id) }}</h4>
                                            <p class="media-comment">
                                                {{ $rate->comment }}
                                            </p>
                                            <span class="rate float-right">
                                                Jakość
                                                @switch($rate->rate)
                                                    @case('1')
                                                        <i class="fas fa-star star"></i>
                                                        <i class="far fa-star star"></i>
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

                                                    @case('3')
                                                        <i class="fas fa-star star"></i>
                                                        <i class="fas fa-star star"></i>
                                                        <i class="fas fa-star star"></i>
                                                        <i class="far fa-star star"></i>
                                                        <i class="far fa-star star"></i>
                                                        @break

                                                    @case('4')
                                                        <i class="fas fa-star star"></i>
                                                        <i class="fas fa-star star"></i>
                                                        <i class="fas fa-star star"></i>
                                                        <i class="fas fa-star star"></i>
                                                        <i class="far fa-star star"></i>
                                                        @break

                                                    @case('5')
                                                        <i class="fas fa-star star"></i>
                                                        <i class="fas fa-star star"></i>
                                                        <i class="fas fa-star star"></i>
                                                        <i class="fas fa-star star"></i>
                                                        <i class="fas fa-star star"></i>
                                                        @break
                                                @endswitch
                                            </span>
                                        </div>
                                    </div>     
                                </li>
                            @endforeach
                        </ul>
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
                        <p><a  href="{{ url('/restaurants/' . $restaurant->id . '/info') }}" class="btn btn-outlined btn-theme btn-lg btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-question-circle"></i> Informacje</a></p>
                        <p><a  href="{{ url('restaurants/' . $restaurant->id . '/rates') }}"a class="btn btn-outlined btn-theme btn-lg btn-activated btn-custom btn-menu" data-wow-delay="0.7s" aria-pressed="true"><i class="fas fa-thumbs-up"></i> Opinie</a></p>
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

