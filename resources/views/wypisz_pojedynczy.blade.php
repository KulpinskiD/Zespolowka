<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
    <body>
        <a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
<div class="form-group">
    <form method = "POST" action= "/update">
        @csrf
            @if(Session::has('bledne_haslo'))
                <div class="alert alert-danger " style="background:red; min-height 100px; min-width:100px;max-height 300px; max-width:300px;"  role="alert">
                    {{ Session::get('bledne_haslo') }}
                </div>
            @endif
            {!! Form::hidden('id', $user->id ) !!}
            {!! Form::hidden('isActiv', 0 ) !!}
            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('email','Email:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
                </div>
            </div>
            <h3>Pola do zmiany hasła opcjonalne jesli nie zostanie uzupełnine hasło zostanie bez zmian</h3>
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
                    {!! Form::label('password1','Powtórz hasło:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::password('password1',null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 control-label">
                </div>
                <div class="col-md-6">
                    <select name="permission" >
                        <option value={{$user->permission}}>
                            @switch($user->permission)
                            @case(0)
                            brak uprawnień
                                @break
                            @case(1)
                            Odczyt
                                @break
                                @case(2)
                            Odczyt i zapis
                                @break
                                @case(3)
                            Super user
                                @break
                            @default
                                
                        @endswitch</option>
                        <option value="0">brak uprawnień</option>
                        <option value="1">Odczyt</option>
                        <option value="2">Odczyt i zapis</option>
                        <option value="3">Super user</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('isActiv','Czy aktywny:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::checkbox('isActiv',$user->isActiv,['class'=>'form-control']) !!}
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit("edytuj",['class'=>'form-btn btn-primary']) !!}
                </div>
            </div>
        
</form>
</body>
