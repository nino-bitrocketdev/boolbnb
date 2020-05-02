@extends('layouts.app')
@section('content')
  <div class="container" style="min-width:300px;">
    <a class="btn btn-primary" href="{{(route('admin.flats.create'))}}">Crea un nuovo appartamento</a>
    <div class="row">
      <h1 class="mt-3">Bacheca Appartamenti</h1>
      {{-- Stampa un errore se non inseriamo dei dati che non rispettino i criteri --}}
      @if($errors->any())
        <h4>{{$errors->first()}}</h4>
      @endif
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Titolo</th>
              <th>Città</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($flats as $flat)
              <tr>
                <td>{{$flat->title}}</td>
                <td>{{$flat->address}}</td>

                <td><a class="btn btn-primary" href="{{(route('admin.flats.show', $flat->slug))}}">Mostra</a> </td>
                <td><a class="btn btn-primary" href="{{(route('admin.flats.edit', $flat->slug))}}">Modifica</a> </td>
                <td>
                  <form action="{{(route('admin.flats.destroy', $flat))}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Elimina</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection