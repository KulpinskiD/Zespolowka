<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
    <body>
        <div class="row">

            @foreach($user as $users)

                <!-- Single video -->
                <div class="col-xs-12 col-md-6 col-lg-4 kotener">
                    <div class="card">
                        <div class="card-content">
                            <h3>email</h3>
                            <p>{{ ($users->email) }}</p>
                            <h3>Uprawnienia</h3>
                            <p>{{ ($users->permission) }}</p>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit($buttonText ?? '',['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </body>
</html>