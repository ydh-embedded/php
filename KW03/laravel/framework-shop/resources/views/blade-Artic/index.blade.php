@extends('../layout')
@section('content')

@csrf

<link href="{{ asset('../css/table.css') }}" rel="stylesheet">


<table >
<div class="tablehead">

    <tr>
        <th>Articel Name</th>
        <th></th>
        <th>Category Name</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</div>

<div class="tablebody">




    @foreach ($articels as $articel)

    <tr>
            <td><a href="/songs/{{ $articel->id }}">{{ $articel->title }}</a>                                             </td>
            <td></td>
            <td> {{ $articel->name}}   {{-- das ist das Feld aus der Labels-Tabell --}}                                                                                  </td>
            <td><a href="/blade-Artic/{{ $articel->id }}/edit"><input type="submit" value="Artikel bearbeiten"></a>             </td>
            <td><form action="/blade-Artic/{{ $articel->id }}"methode="post"> @csrf @method('DELETE')</form>                 </td>
            <td><input type="submit" value="Artikel löschen" >                                                         </td>
    </tr>

        
    @endforeach
</div>
</table>
<div>
    <ul>
        @foreach ($errors->all() as $error)

        <li>  {{  $error }}    </li>        {{-- für die en Variante         --}}
        <li>  {!! $error !!}   </li>        {{-- für die de Variante "deutsche"   --}}
        @endforeach
    </ul>
</div>
@endsection