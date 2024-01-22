@extends('../layout')
@section('Content')
    <h1>Kategorie anlegen</h1>
<form action="/category" method="POST">


@csrf                                                       {{-- Token für Sicherheitsüberwachung --}}


<div>

    <label          for     =   "CategName" >Kategorie</label>
    <input
                    type    =   "text"
                    name    =   "CategName"
                    id      =   "CategName"
                    value   =   "{{ old('CategName')}}"         {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
    >

</div>

<div>

    <label          for     =   "CategContent"  >Inhalt</label>
    <input
                    type    =   "text"
                    name    =   "CategContent"
                    id      =   "CategContent"
                    value   =   "{{ old('CategContent')}}"          {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
    >

</div>


<div>
    <input type="submit" value="eintragen">
</div>

<div>
    <ul>
        @foreach ($errors->all() as $error)

        <li>  {{  $error }}    </li>        {{-- für die en Variante         --}}
        <li>  {!! $error !!}   </li>        {{-- für die de Variante "deutsche"   --}}
        @endforeach
    </ul>
</div>

    </form>
@endsection