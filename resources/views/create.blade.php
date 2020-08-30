
    <form method = "POST" action= "/create">
        @csrf
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
                </div>
                <div class="col-md-6">
                    <select name="permission">
                        <option value="0">brak uprawnień</option>
                        <option value="1">Odczyt</option>
                        <option value="2">Odczyt i zapis</option>
                        <option value="3">Super user</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit("utwórz",['class'=>'form-btn btn-primary']) !!}
                </div>
            </div>
        
</form>

