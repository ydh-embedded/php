@extends('../layout')
@section('content')
<header>
    <h2>{{ $articel->title }} </h2>
</header>
<body>
    <p>
        von der Kategorie {{ $articel->name }}
    </p>
</body>
@endsection