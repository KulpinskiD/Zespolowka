<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
<body>
<a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
<a class="przyciski_powrotu" href="/wypisywanie">Powrót do listy wszystkich użytkowników</a>
    <form method = "POST" action= "/create" >
        @csrf
        <div class="przerwa">
                @if(Session::has('bledne_haslo'))
                    <div class="alert alert-danger " style="background:red; min-height 100px; min-width:100px;max-height 300px; max-width:300px;"  role="alert">
                {{ Session::get('bledne_haslo') }}
                </div>
            @endif
            {!! Form::hidden('isActiv', 1) !!}
            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('email','Email:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::email('email',null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('password','Haslo:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::password('password',null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('password1','powtórz hasło:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::password('password1',null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('section','Nazwa działu:') !!}
                </div>
                
                <div class="col-md-6">
                    {!! Form::select('section',$section,null,['class'=>'form-control']) !!}

                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-4 control-label">
                </div>
                <div class="col-md-6">
                    <select name="permission []" multiple="multiple" id="permission">
                        <option value="Wychodzące zapis">Wychodzące zapis</option>
                        <option value="Wychodzące odczyt">Wychodzące odczyt</option>
                        <option value="Przychodzące zapis">Przychodzące zapis</option>
                        <option value="Przychodzące odczyt">Przychodzące odczyt</option>
                        <option value="Super user">Super user</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit("utwórz",['class'=>'form-btn btn-primary']) !!}
                </div>
            </div>
        </div>
        
</form>
</body>

