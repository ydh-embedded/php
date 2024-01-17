@extends('songs.layout')
@section('content')

<form action="/songs" method="post"></form>


@csrf                                                       {{-- Token für Sicherheitsüberwachung --}}


<div>

    <label          for     =   "title" >Titel</label>
    <input
                    type    =   "text"
                    name    =   "title"
                    id      =   "title"
                    value   =   "{{ old('title')}}"         {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
    >

</div>

<div>

    <label          for     =   "band"  >Band</label>
    <input
                    type    =   "text"
                    name    =   "band"
                    id      =   "band"
                    value   =   "{{ old('band')}}"          {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
    >

</div>


<div>
    <input type="submit" value="eintragen">
</div>

<div>
    <ul>
        @foreach ($errors->all() as $error)

        <li>  {{  $error }}    </li>        {{-- für die en Variante         --}}
        <li>  {!! $error !!}   </li>        {{-- für die deutsche variante   --}}
        @endforeach
    </ul>
</div>



    
@endsection