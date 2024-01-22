@extends('../layout')
@section('content')
<form action="/articels/{{$articel->id}}" method="post"></form>   {{-- hier kein edit da bei der PUT Methode ohne edit die Methode Update aufgerufen wird --}}


@csrf                                                       {{-- Token für Sicherheitsüberwachung --}}

@method('PUT')                                              {{-- directive PUT Methode angeben weil de server das sonst nicht kann --}}

<div>
<table>
{{-- ============================================================================================== --}}


<div class="tablehead">
    <tr>
            <th><label  for     =   "ArticName_id_ref"      >ArticName_id_ref	</label></th>
            <th><label  for     =   "ArticName"             >ArticName          </label></th>
            <th><label  for     =   "ArticDescription"      >ArticDescription   </label></th>
            <th><label  for     =   "ArticPicture"          >ArticPicture       </label></th>
            <th><label  for     =   "ArticThumbnail"        >ArticThumbnail     </label></th>
            <th></th>
    </tr>
</div>

{{-- ============================================================================================== --}}
  <div class="tablebody">
    <tr>






        <td><input
            type    =   "text"
            name    =   "ArticName_id_ref"
            id      =   "ArticName_id_ref"
       {{-- value   =   "{{ old('title')}}" --}}         {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
            value   =   "{{ $articel->ArticName_id_ref}}"              {{--  --}}
            >
        </td>





        <td><input
            type    =   "text"
            name    =   "ArticName"
            id      =   "ArticName"
       {{-- value   =   "{{ old('band')}}" --}}          {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
            value   =   "{{ $articel->ArticName}}"               {{--  --}}
            >
        </td>






        <td><input
            type    =   "text"
            name    =   "ArticDescription"
            id      =   "ArticDescription"
       {{-- value   =   "{{ old('title')}}" --}}         {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
            value   =   "{{ $articel->ArticDescription}}"              {{--  --}}
            >
        </td>






        <td><input
            type    =   "text"
            name    =   "ArticPicture"
            id      =   "ArticPicture"
       {{-- value   =   "{{ old('title')}}" --}}         {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
            value   =   "{{ $articel->ArticPicture}}"              {{--  --}}
            >
        </td>






        <td><input
            type    =   "text"
            name    =   "ArticThumbnail"
            id      =   "ArticThumbnail"
       {{-- value   =   "{{ old('title')}}" --}}         {{-- wir verwenden die Function old um die Eingabe anzeigen zu lassen --}}
            value   =   "{{ $articel->ArticThumbnail}}"              {{--  --}}
            >
        </td>






        <td>
         <select name="labels_id_ref" id="label">
           @foreach ($categories as $categorie)
               <option value="{{$category->id}}"
                       @if ($category->id == $articel->ArticName_id_ref) selected @endif >
                       {{$label->name}}
               </option>
           @endforeach
         </select>
        </td>


{{-- ============================================================================================== --}}



    <tr>

        <td></td>
        <td></td>
        <td></td>
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