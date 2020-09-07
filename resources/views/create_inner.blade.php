<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
<body>
<a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
<a class="przyciski_powrotu" href="/wypisywanie">Powrót do listy wszystkich użytkowników</a>
    <form method = "POST" action= "/create_writings" >
        @csrf
        <div class="przerwa">
            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('title','Tytuł:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('description','Opis:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('description',null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('Company_list','Lista_firm:') !!}
                </div>
                
                <div class="col-md-6">
                    {!! Form::select('Company_list',$companyes,null,['class'=>'form-control']) !!}

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

