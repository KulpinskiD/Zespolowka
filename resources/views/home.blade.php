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

                @if($user->permission>=3)
                
                <a class="przyciski" href="/check_create">Dodaj użytkownika</a>
                <a class="przyciski" href="/wypisywanie">Wypisz użytkownikow do edycji</a>
                
                @endif
                @if($user->permission>=2)
                
                <a class="przyciski" href="/check_firmy">Dodaj firme</a>
                <a class="przyciski" href="/check_writings">Dodaj pismo</a>
                
                @endif
                @if($user->permission>=1)
                
                <a class="przyciski" href="/wypisz_firmy">Wypisz wszystkie firmy </a>
                <a class="przyciski" href="/writings_outers">Wypisz wszystkie pisma zewneczne</a>
                
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
