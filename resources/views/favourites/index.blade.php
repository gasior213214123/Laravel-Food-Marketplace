@extends('layouts.app')

@section('content')
@include('layouts.user')
                <div class="tab-pane active" id="Favourites" role="tabpanel">
                    <hr>
                    @if($favourites->count() === 0)
                        <p>Brak ulubionych</p>
                    @else
                        @foreach ($favourites as $rst)
                            <div class="col-xs-8 col-xs-offset-2 slide-row row">
                                <div class="col-xs-1">
                                    <img src="{{ url('restaurant-avatar/' . $rst->id . '/150') }}" alt="Image" class="thumbnail rounded-circle img-responsive">
                                </div>
                                <div class="col-xs-7" style="padding-left: 15px;">
                                    <h4>{{ $rst->name}}
                                    @switch(restaurant_rate_stats($rst->id)['star_display'])
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
                                        <a href="{{ url('/restaurants/' . $rst->id) }}"><button class="btn btn-sm btn-success"><i class="fas fa-sign-in-alt"></i> Przejdź do restauracji</button></a>
                                    </span>
                                    <span class="float-right buttons">
                                        <form method="POST" action="{{ url('/favourites/' . $rst->id ) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE')}}
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Usuń z ulubionych</button>
                                        </form>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection