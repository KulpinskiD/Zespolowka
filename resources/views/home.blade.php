@extends('layouts.app')

@section('content')
<h1>Menu główne dostępu po zalogowaniu</h1>
@if (Session::has('permission_erorr'))
	<div class="alert alert-success card">
		{{ Session::get('permission_erorr') }}
	</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @auth
                <a  class="dropdown-item przyciski" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Wyloguj') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endauth
                {!! Form::hidden($admin=0) !!}
                {!! Form::hidden($przychodzace=0) !!}
                {!! Form::hidden($wewneczne=0) !!}
                @foreach ($permisions as $permision)

                    @if($permision=="Super user" and $admin==0)
                    <a class="przyciski" href="/wypisywanie">Wypisz użytkowników</a>
                    <a class="przyciski" href="/wypisz_firmy">Wypisz wszystkie firmy </a>
                    {{ $admin++ }}
                    
                    @endif
                    @if(($permision=="Super user" or $permision=="Przychodzące zapis" or $permision=="Przychodzące odczyt") and $przychodzace==0 )
                        
                    <a class="przyciski" href="/writings_inner">Pisma Przychodzące </a>
                    {!! Form::hidden($przychodzace++) !!}
                    
                    
                    @endif
                    @if(($permision=="Super user" or $permision=="Wychodzące odczyt" or $permision=="Wychodzące zapis") and $wewneczne==0)
                    <a class="przyciski" href="/writings_outers">Pisma Wychodzące </a>
                    {!! Form::hidden($wewneczne++) !!}
                
                @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
