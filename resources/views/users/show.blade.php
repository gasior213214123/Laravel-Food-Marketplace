@extends('layouts.app')

@section('content')
@include('layouts.user')
                <div class="tab-pane active" id="MyProfile" role="tabpanel">
                    <hr>
                    <div class="form-group">
                        <div class="col col-xs-6">
                            <label for="first_name"><h4>Imię</h4></label><br>                   
                            <label for="first_name">{{ $user->name }}</label>  
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col col-xs-6">
                            <label for="email"><h4>Email</h4></label><br>               
                            <label for="email">{{ $user->email }}</label> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col col-xs-6">
                            <label for="city"><h4>Miasto</h4></label><br>               
                            <label for="city">{{ $user->city }}</label> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col col-xs-6">
                            <label for="adress"><h4>Adres</h4></label><br>               
                            <label for="adress">{{ $user->adress }}</label> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col col-xs-6">
                            <label for="phone"><h4>Telefon</h4></label><br>                   
                            <label for="phone">{{ $user->phone }}</label> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <a href="{{ url('/users/' . $user->id . '/edit') }}"><button class="btn btn-lg btn-primary" type="submit"><i class="fas fa-user-edit"></i>Edytuj dane</button></a>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection