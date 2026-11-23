@extends('layout')

@section('content')

<h1>Nevek</h1>

@foreach (['a', 'á', 'b', 'c', 'cs', 'd', 'dz', 'dzs', 'e', 'é', 'f', 'g', 'gy', 'h', 'i', 'í', 'j', 'k', 'l', 'ly', 'm', 'n', 'ny', 'o', 'ó', 'ö', 'ő', 'p', 'q', 'r', 's', 'sz', 't', 'ty', 'u', 'ú', 'ü', 'ű', 'v', 'w', 'x', 'y', 'z', 'zs'] as $c)
<a href="{{ route('names', compact('c')) }}">{{ $c }}</a>
@endforeach
<br>

<table class="content-table">
    @foreach ($names as $name)
    <tr>
        <td class="content-cell">{{ $name->name }}</td>
        <td class="content-cell"><a href="{{ route('names.show', $name->name) }}">További információk...</a></td>
    </tr>
    @endforeach
</table>
<br>

<a href="{{ route('names', ['pageToken' => $nextPageToken]) }}">Következő</a>

@endsection