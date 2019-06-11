@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Potwierdzenie weryfikacji</div>

                <div class="card-body">
							Twój email został zweryfikowany. Kliknij tutaj aby się zalogować <a href="{{url('/login')}}">zaloguj</a>
						</div>
					</div>
			</div>
		</div>
	</div>
@endsection