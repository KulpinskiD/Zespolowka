<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
    <body>
        <a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
<div class="form-group">
    <form method = "POST" action= "/update_outers">
        @csrf
        {!! Form::hidden('id', $writing->id) !!}
        <div class="przerwa">
            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('title','Tytuł:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('title',$writing->title,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('description','Opis:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('description',$writing->description,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('number_of_facture','Numer pisma:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::Text('number_of_facture',$writing->number_of_facture,['class'=>'form-control']) !!}
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
                    {!! Form::submit("edytuj",['class'=>'form-btn btn-primary']) !!}
                </div>
            </div>
        
</form>
</body>
