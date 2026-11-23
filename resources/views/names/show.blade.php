@extends('layout')

@section('content')

<h1>Név információ</h1>

<ul>
    <li>Név: {{ $name->name }}</li>
    <li>Nem: {{ $name->sex === 1 ? "Férfi" : ($name->sex === 2 ? "Nő" : "Uniszex") }}</li>
    <li>Leírás: {{ $name->description }}</li>
    <li>Kiejtés: {{ $name->phonetic }}</li>
    <li>Anyakönyvezhető-e: {{ $name->certificate ? "Igen" : "Nem" }}</li>
    <li>
        Névnapok:
        <ul>
            @foreach ($nameday->dates as $date)
            <li class="{{ $date->main ? 'main-nameday' : '' }}">{{ $date->hu }}</li>
            @endforeach
        </ul>
    </li>
    @if (!$nameForms->isEmpty)
    <li>
        Történelmi névformák:
        @if ($nameForms->forms->latin)
        <ul>
            Latin:
            <li>
                @foreach ($nameForms->forms->latin as $name)
                <ul>{{ $name }}</ul>
                @endforeach
            </li>
        </ul>
        @endif
        @if ($nameForms->forms->cyrillic)
        <ul>
            Cirill:
            <li>
                @foreach ($nameForms->forms->cyrillic as $name)
                <ul>{{ $name }}</ul>
                @endforeach
            </li>
        </ul>
        @endif
        @if ($nameForms->forms->greek)
        <ul>
            Görög:
            <li>
                @foreach ($nameForms->forms->greek as $name)
                <ul>{{ $name }}</ul>
                @endforeach
            </li>
        </ul>
        @endif
    </li>
    @endif
</ul>

@endsection