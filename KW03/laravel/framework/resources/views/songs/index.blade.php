@extends('songs.layout')
@section('content')

<link href="{{ asset('../css/table.css') }}" rel="stylesheet">


<table >
<div class="tablehead">

    <tr>
        <th>Song Name</th>
        <th>Band Name</th>
        <th>Label Name</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</div>

<div class="tablebody">




    @foreach ($songs as $song)

    <tr>
            <td><a href="/songs/{{ $song->id }}">{{ $song->title }}</a>                                             </td>
            <td>{{ $song->band }}                                                                                   </td>
            <td> {{ $song->name}}   {{-- das ist das Feld aus der Labels-Tabell --}}                                                                                  </td>
            <td><a href="/songs/{{ $song->id }}/edit"><input type="submit" value="Song bearbeiten"></a>             </td>
            <td><form action="/songs/{{ $song->id }}"methode="post"> @csrf @method('DELETE')</form>                 </td>
            <td><input type="submit" value="Song löschen" >                                                         </td>
    </tr>

        
    @endforeach
</div>
</table>
@endsection