<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
    <body>
        <a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
        <a class="przyciski_powrotu" href="/check_create">Dodaj użytkownika</a>
        <div class="row przerwa">
            @foreach($users as $user)
                <!-- Single video -->
                <div class="col-xs-12 col-md-6 col-lg-4 kotener">
                    <div class="card">
                        <div class="card-content">
                            <h3>email</h3>
                            <p>{{ ($user->email) }}</p>
                            <h3>Uprawnienia</h3>
                            @foreach ($permisions_user as $permision_user)
                               @if ($user->id==$permision_user->id_user)
                               <p>{{ ($permision_user->permissions) }}</p>
                               @endif 
                            @endforeach
                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href=" {{ action('UserController@edit', $user->id)  }}">
                                    Edytuj
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </body>
</html>