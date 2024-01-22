@extends('../layout')
@section('content')

@csrf

<header>
    <h2>{{ $articel->title }} </h2>
</header>
<body>
    <p>
        von der Kategorie {{ $articel->name }}
    </p>
</body>
<div>
    <ul>
        @foreach ($errors->all() as $error)

        <li>  {{  $error }}    </li>        {{-- für die en Variante         --}}
        <li>  {!! $error !!}   </li>        {{-- für die de Variante "deutsche"   --}}
        @endforeach
    </ul>
</div>
@endsection