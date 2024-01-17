@extends('songs.layout')
@section('content')

<form action="/songs/{{$song->id}}" method="post"></form>   {{-- hier kein edit da bei der PUT Methode ohne edit die Methode Update aufgerufen wird --}}


@csrf                                                       {{-- Token für Sicherheitsüberwachung --}}

@method('PUT')                                              {{-- directive PUT Methode angeben weil de server das sonst nicht kann --}}

<div>
<table>
{{-- ============================================================================================== --}}


<div class="tablehead">
    <tr>
            <th><label          for     =   "title" >Titel</label></th>
            <th><label          for     =   "band"   >Band</label></th>
            <th><label          for     =   "label" >Label</label></th>
    </tr>
</div>

{{-- ============================================================================================== --}}
  <div class="tablebody">
    <tr>






        <td><input
            type    =   "text"
            name    =   "title"
            id      =   "title"
       {{-- value   =   "{{ old('title')}}" --}}         {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
            value   =   "{{ $song->title}}"              {{--  --}}
            >
        </td>





        <td><input
            type    =   "text"
            name    =   "band"
            id      =   "band"
       {{-- value   =   "{{ old('band')}}" --}}          {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
            value   =   "{{ $song->band}}"               {{--  --}}
            >
        </td>






        <td>
         <select name="labels_id_ref" id="label">
           @foreach ($labels as $label)
               <option value="{{$label->id}}"
                       @if ($label->id == $song->labels_id_ref) selected @endif >
                       {{$label->name}}
               </option>
           @endforeach
         </select>
        </td>


{{-- ============================================================================================== --}}



    <tr>

        <td></td>
        <td></td>
        <td><input type="submit" value="eintragen" >
            <ul>
                @foreach ($errors->all() as $error)
        
                <li>  {{  $error }}    </li>        {{-- für die en Variante         --}}
                <li>  {!! $error !!}   </li>        {{-- für die deutsche variante   --}}
                @endforeach
            </ul>
        </td>

    </tr>


</div>
{{-- ============================================================================================== --}}

</table>

@endsection