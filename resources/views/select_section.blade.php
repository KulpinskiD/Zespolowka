<form method = "POST" action= "/create_writings" >
    @csrf
    <div class="przerwa">
        <div class="form-group">
            <div class="col-md-4 control-label">
             @foreach ($name_sections as $section)
             <label for="{{ $section->name }}" class="w-100 p-2">
                <input
                    class="mt-0 aaa"
                    style="display:none;" 
                    type="checkbox" 
                    name="disciplines[]"
                    id="{{ $section->name }}"
                    value="{{ $section->id }}"
                    {{ (is_array(old('disciplines')) && in_array($discipline->id, old('disciplines'))) ? ' checked' : '' }}
                >
            </label>
             
             @endforeach
             <div class="col-md-6 col-md-offset-4">
                {!! Form::submit("utwórz",['class'=>'form-btn btn-primary']) !!}
            </div>
    </div>