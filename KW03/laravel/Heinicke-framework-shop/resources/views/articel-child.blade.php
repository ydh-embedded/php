{{--    Child-Template    --}}
@extends('layout')

{{-- Wir übergeben den Parameter 'Content' dieser muss mit dem @yield - Parameter aus dem Master übereinstimmen --}}

@section('content')

    <h3>Der Inhalt aus dem articel-child.blade.php</h3>
    
@endsection

@section('sidebar')

    @parent
    
@endsection


<x-articel-child heading="{{$heading}}" title="{{$title}}">{{$content}} /x-articel-child>
<x-articel-child footer="{{footer}}"></x-articel-child>