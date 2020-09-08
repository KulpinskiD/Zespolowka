<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
    <body>
        <a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
        {!! Form::hidden($dodawanie=0) !!}
        @foreach ($permisions as $permision)
        @if (($permision=="Super user" or $permision=="Przychodzące zapis") and $dodawanie==0)
        <a class="przyciski_powrotu" href="/check_writings_inner">Dodaj pismo</a>
        {!! Form::hidden($dodawanie++) !!}
        @endif
        @endforeach
        
        <div class="row przerwa">

            @foreach($writings as $writing)
                <!-- Single video -->
                <div class="col-xs-12 col-md-6 col-lg-4 kotener">
                    <div class="card">
                        <div class="card-content">
                            <h3>Nr_pisma</h3>
                            <p>{{ ($writing->number_of_facture) }}</p>
                            <h3>Data ostatniej aktualizacji</h3>
                            <p>{{ ($writing->updated_at) }}</p>
                            @foreach ($name_company as $name)
                                @if($writing->id_companies==$name->id)
                                
                                    <h3>Nazwa firmy</h3>
                                <p>{{ ($name->name) }}</p>
                                @endif
                            @endforeach
                            <h3>Tytuł</h3>
                            <p>{{ ($writing->title) }}</p>
                        </div>

                        {!! Form::hidden($edycja=0) !!}
                        @foreach ($permisions as $permision)
                        @if (($permision=="Super user" or $permision=="Przychodzące zapis")&&$edycja==0) 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href=" {{ action('InnerController@edit', $writing->id)  }}">
                                {!! Form::hidden($edycja++) !!}
                                    Edytuj
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href=" {{ action('InnerController@preview', $writing->id)  }}">
                                    Podgląd
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </body>
</html>
