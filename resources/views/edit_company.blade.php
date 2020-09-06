
    <html>
        <header>
            <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
        </header>
    <body>
    <a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
    <a class="przyciski_powrotu" href="/wypisz_firmy">Powrót do listy wszystkich firm</a>
    <div class="przerwa">
    <form method = "POST" action= "/update_company">
        @csrf
        {!! Form::hidden('id', $companyes->id ) !!}
                <div class="form-group">
                    <div class="col-md-4 control-label">
                        {!! Form::label('name','Nazwa:') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('name',$companyes->name,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 control-label">
                        {!! Form::label('nip','Nip:') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('nip',$companyes->nip,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 control-label">
                        {!! Form::label('city','Miasto') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('city',$companyes->city,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 control-label">
                        {!! Form::label('adress','Adress') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('adress',$companyes->adress,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 control-label">
                        {!! Form::label('activity','Czym się firma zajmuje') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('activity',$companyes->activity,['class'=>'form-control']) !!}
                    </div>
                </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit("edytuj",['class'=>'form-btn btn-primary']) !!}
                </div>
            </div>
        
</form>
    </div>
    </body>

