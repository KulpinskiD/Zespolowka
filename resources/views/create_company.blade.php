
    <form method = "POST" action= "/create_company">
        @csrf
            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('name','Nazwa:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('nip','Nip:') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('nip',null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('city','Miasto') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('city',null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('adress','Adress') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('adress',null,['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    {!! Form::label('activity','Czym się firma zajmuje') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('activity',null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit("utwórz",['class'=>'form-btn btn-primary']) !!}
                </div>
            </div>
        
</form>

