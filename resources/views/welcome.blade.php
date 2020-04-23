@extends('layouts.app')


<title>BoolBnb</title>
@section('content')
    </div>
    {{-- barra grande per la ricerca con solo nome o citta  --}}
    <div class="form-group text-center">
        <form action="{{route('search')}}" method="get">
            @csrf
            @method('GET')
            <input name="address" type="text" value="" placeholder="Inserisci l'indirizzo">
            <input name="city" type="text" value="" placeholder="Inserisci citta'">
            <input name="ray" type="number" value="" placeholder="Inserisci distanza in Km">
            <button type="submit">Vai</button>
        </form>
    </div>
    {{-- wrap per slider img --}}
    <table class="table">
        <thead>
            <tr>
            <th>Title</th>
            <th>City</th>
            <th>View</th>
            <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($flats as $flat)
            <tr>
                <td>{{$flat->title}}</td>
                <td>{{$flat->address}}</td>
                <td><a class="btn btn-primary" href="{{(route('showflat', $flat->id))}}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
