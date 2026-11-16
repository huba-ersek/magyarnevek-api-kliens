@extends('layout')

@section('content')

<h1>Nevek</h1>

<table class="content-table">
    @foreach ($names as $name)
    <tr>
        <td class="content-cell">{{ $name->name }}</td>
        <td class="content-cell"><a>További információk...</a></td>
    </tr>
    @endforeach
</table>

@endsection