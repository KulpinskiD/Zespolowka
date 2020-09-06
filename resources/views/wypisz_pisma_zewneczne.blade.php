<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
    <body>
        <a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
        <div class="row przerwa">

            @foreach($writings as $writing)
                <!-- Single video -->
                <div class="col-xs-12 col-md-6 col-lg-4 kotener">
                    <div class="card">
                        <div class="card-content">
                            @foreach ($name_company as $name)
                                @if($writing->id_companies==$name->id)
                                
                                    <h3>Nazwa firmy</h3>
                                <p>{{ ($name->name) }}</p>
                                @endif
                            @endforeach
                            <h3>Nr_pisma</h3>
                            <p>{{ ($writing->number_of_facture) }}</p>
                            <h3>Opis</h3>
                            <p>{{ ($writing->description) }}</p>
                            <h3>Tytuł</h3>
                            <p>{{ ($writing->title) }}</p>
                        </div>
                        @if($permisin>=2)
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href=" {{ action('WritingsController@edit', $name->id)  }}">
                                    Edytuj
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

            @endforeach

        </div>
    </body>
</html>