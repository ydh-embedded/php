@extends('songs.layout')
@section('content')
<header>
    <h2>{{ $song->title }} </h2>
</header>
<body>
    
    <p>
        von {{ $song->band }}
    </p>
    <p>
        vom Label {{ $song->name }}
    </p>
</body>
@endsection