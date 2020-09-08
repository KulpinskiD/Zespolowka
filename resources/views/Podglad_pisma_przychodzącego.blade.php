<html>
    <header>
        <link rel="stylesheet" href="{{ URL::asset('style.css')}}">
    </header>
    <body>
        <a class="przyciski_powrotu" href="/home">Powrót do panelu sterowania</a>
        <a class="przyciski_powrotu" href="/writings_inner">Powrót do listy pism</a>
        <div class="form-group">
        <div class="przerwa">

            <div class="form-group">
                <div class="col-md-4 control-label">
                    <p>Numer pisma</p>
                </div>
                <div class="col-md-6">
                    <p>{{ ($writing->number_of_facture) }}</p> 
                </div>
            </div>
            
            <p>Ostatnia data aktualizacja pisma</p>
            <p>{{ ($writing->updated_at) }}</p> 

            <div class="form-group">
                <div class="col-md-4 control-label">
                    <p>Nadawca</p>
                </div>
                <div class="col-md-6">
                    @foreach ($companyes as $companye)
                        @if ($companye->id==$writing->id_companies)
                            {{ $companye->name }}
                        @endif
                    @endforeach
                </div>
            </div>
            

            <div class="form-group">
                <div class="col-md-4 control-label">
                    <p>Tytuł</p>
                </div>
                <div class="col-md-6">
                    {{$writing->title  }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 control-label">
                    <p>Opis</p>
                </div>
                <div class="col-md-6">
                    {{ $writing->description }}
                </div>
            </div>
</body>
