@extends('songs.layout')
@section('content')
@@extends('css/table.css')
<?
    include_once = "css/table.css" ;
?>


<table>
    <div class="tablehead">

        <tr>
            <td>Song Name</td>
            <td>Band Name</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </div>

<div class="tablebody">




    @foreach ($songs as $song)

    <tr>
            <td><a href="/songs/{{ $song->id }}">{{ $song->title }}</a>                                             </td>
            <td>{{ $song->band }}                                                                                   </td>
            <td><a href="/songs/{{ $song->id }}/edit"><input type="submit" value="Song bearbeiten"></a>             </td>
            <td><form action="/songs/{{ $song->id }}"methode="post"> @csrf @method('DELETE')</form>                 </td>
            <td><input type="submit" value="Song löschen" >                                                         </td>
    </tr>

        
    @endforeach
</div>
</table>
@endsection