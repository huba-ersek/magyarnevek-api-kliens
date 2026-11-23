@extends('layout')

@section('content')

<h1>Név információ</h1>

<ul>
    <li>Nem: {{ $name->sex === 1 ? "Férfi" : ($name->sex === 2 ? "Nő" : "Uniszex") }}</li>
    <li>Leírás: {{ $name->description }}</li>
    <li>Kiejtés: {{ $name->phonetic }}</li>
    <li>Anyakönyvezhető-e: {{ $name->certificate ? "Igen" : "Nem" }}</li>
</ul>

@endsection