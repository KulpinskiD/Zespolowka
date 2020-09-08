<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
    <body>
        <a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
        <a class="przyciski_powrotu" href="/writings_inner">Powrót do listy pism</a>
<div class="form-group">
    <form method = "POST" action= "/update_inner">
        @csrf
        
        {!! Form::hidden('id', $writing->id) !!}
        <div class="przerwa">

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('number_of_facture','Numer pisma:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::Text('number_of_facture',$writing->number_of_facture,['class'=>'form-control']) !!}
                </div>
            </div>
            
            <p>Ostatnia data aktualizacja pisma</p>
            <p>{{ ($writing->updated_at) }}</p> 

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('Company_list','Nadawca:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::select('Company_list',$companyes,$writing->id_companies-=1,['class'=>'form-control']) !!}

                </div>
            </div>
            

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

            {!! Form::hidden($godzina=date("H")) !!}
            {!! Form::hidden($godzina+=2) !!}
            {!! Form::hidden($data=date("Y-m-d $godzina:i:s")) !!}
            {!! Form::hidden('updated_at', $data) !!}
            

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit("edytuj",['class'=>'form-btn btn-primary']) !!}
                </div>
            </div>
        
</form>
</body>
