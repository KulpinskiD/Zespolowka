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
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($buttonText ?? '',['class'=>'form-btn btn-primary']) !!}
    </div>
</div>