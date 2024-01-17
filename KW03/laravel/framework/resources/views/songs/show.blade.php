@extends('songs.layout')
@section('content')
<p>
    {{ $song->title }} von {{ $song->band }}
</p>
@endsection