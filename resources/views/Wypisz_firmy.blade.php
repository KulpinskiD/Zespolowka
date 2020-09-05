<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
    <body>
        <div class="row">

            @foreach($companyes as $company)

                <!-- Single video -->
                <div class="col-xs-12 col-md-6 col-lg-4 kotener">
                    <div class="card">
                        <div class="card-content">
                            <h3>Nazwa</h3>
                            <p>{{ ($company->name) }}</p>
                            <h3>Miasto</h3>
                            <p>{{ ($company->city) }}</p>
                            <h3>Adres</h3>
                            <p>{{ ($company->adress) }}</p>
                            <h3>Czym się zajmuje</h3>
                            <p>{{ ($company->activity) }}</p>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href=" {{ action('CompaniesController@edit', $company->id)  }}">
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