@extends('layout')

@section('content')

<h1>Nevek</h1>

@foreach (['a', 'á', 'b', 'c', 'cs', 'd', 'dz', 'dzs', 'e', 'é', 'f', 'g', 'gy', 'h', 'i', 'í', 'j', 'k', 'l', 'ly', 'm', 'n', 'ny', 'o', 'ó', 'ö', 'ő', 'p', 'q', 'r', 's', 'sz', 't', 'ty', 'u', 'ú', 'ü', 'ű', 'v', 'w', 'x', 'y', 'z', 'zs'] as $c)
<a href="{{ route('names', compact('c')) }}">{{ $c }}</a>
@endforeach
<br>

<form action="{{ route('names') }}" method="GET">
    <fieldset>
        <h3>Szűrés</h3>
        <label for="sex">Nem:</label>
        <select id="sex" name="sex">
            <option></option>
            <option value="1">Férfi</option>
            <option value="2">Nő</option>
            <option value="3">Uniszex</option>
        </select>
        <br>
        <label for="cert">Anyakönyvezhető-e:</label>
        <select id="cert" name="cert">
            <option></option>
            <option value="true">Igen</option>
            <option value="false">Nem</option>
        </select>
        <br>
        <label for="needle">
            <select name="needle-type">
                <option value="name">Keresés név szerint:</option>
                <option value="all">Keresés név és leírás szerint:</option>
            </select>
        </label>
        <input id="needle" name="needle" type="text">
        <br>
        <button type="submit">Keresés</button>
    </fieldset>
</form>

<table class="content-table">
    @foreach ($names as $name)
    <tr>
        <td class="content-cell">{{ $name->name }}</td>
        <td class="content-cell"><a href="{{ route('names.show', $name->name) }}">További információk...</a></td>
    </tr>
    @endforeach
</table>
<br>

@if ($nextPageToken)
<a href="{{ route('names', ['pageToken' => $nextPageToken]) }}">Következő</a>
@endif

@endsection