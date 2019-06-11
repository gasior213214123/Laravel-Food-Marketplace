@extends('layouts.app')

@section('content')
@include('layouts.user')
                <div class="tab-pane active" id="rates" role="tabpanel">
                    <hr>
                    <div class="col">
                        @if($rates->count() === 0)
                            <h1 style="text-align: center;">Brak ocen użytkownika</h1>
                        @else                    
                        <h1 style="text-align: center;">Statystyki</h1>
                        <div class="row">
                            <div class="col" style="text-align: center;">
                                <div class="rating-block">
                                    <p>Średnia ocena użytkownika z {{ $rates->count() }} zamówień</p>
                                    <p class="bold padding-bottom-7">{{ round(user_rate_stats($rates->first()->user_id)->get('avg_rate'), 2) }} <small>/ 5</small></p>
                                    @switch(user_rate_stats($user->id)['star_display'])
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
                                    <p>Oceny użytkownika</p>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">5 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: {{ user_rate_stats($rates->first()->user_id)->get('five_percentage') }}%">
                                                <span class="sr-only">100% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ user_rate_stats($rates->first()->user_id)->get('five_star') }}</div>
                                    </div>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">4 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: {{ user_rate_stats($rates->first()->user_id)->get('four_percentage') }}%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ user_rate_stats($rates->first()->user_id)->get('four_star') }}</div>
                                    </div>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">3 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: {{ user_rate_stats($rates->first()->user_id)->get('three_percentage') }}%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ user_rate_stats($rates->first()->user_id)->get('three_star') }}</div>
                                    </div>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">2 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: {{ user_rate_stats($rates->first()->user_id)->get('two_percentage') }}%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ user_rate_stats($rates->first()->user_id)->get('two_star') }}</div>
                                    </div>
                                    <div class="float-left">
                                        <div class="float-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">1 <i class="fas fa-star star"></i></div>
                                        </div>
                                        <div class="float-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: {{ user_rate_stats($rates->first()->user_id)->get('one_percentage') }}%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="float-right" style="margin-left:10px;">{{ user_rate_stats($rates->first()->user_id)->get('one_star') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        @endif
                    </div>
                        <div class="col">
                            <h1 style="text-align: center;">Twoje oceny</h1>         
                            <ul class="media-list">
                                @foreach ($rates as $rate)
                                    <li class="media">
                                        <a class="float-left" style="padding-right: 5px;">
                                            <img class="media-object rounded-circle" src="{{ url('restaurant-avatar/' . $rate->restaurant_id . '/100') }}" alt="circle" class="thumbnail img-responsive">
                                        </a>
                                        <div class="media-body">
                                            <div class="well well-lg">
                                                <p class="reviews float-right rate">{{ $rate->created_at }}</p>
                                                <h4 class="reviews">{{ restaurant_name($rate->restaurant_id) }}</h4>
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
                        <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection