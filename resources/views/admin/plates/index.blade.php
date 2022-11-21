@extends('layouts.app')

@section('content')
  <section>
    <div class="container">
      <div class="head_content10 d-flex justify-content-between mb-2">
        <h1>
            Lista dei piatti
        </h1>
        <a href="{{ route('admin.plates.create') }}"><button type="button" class="btn btn-secondary btn-lg">Aggiungi un nuovo piatto</button></a>   
      </div>
      <div class="body_content">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                {{-- <th>Src</th> --}}
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Prezzo_€</th>
                <th>Disponibilità</th>
                <th>Ristorante</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            @foreach ($plates as $plate)
              <tr>
                <td> {{ $plate->id }} </td>
                {{-- <td> {{ $plate->img }} </td> --}}
                <td> {{ $plate->name }} </td>
                <td> {{ $plate->description }} </td>
                <td> {{ $plate->price }} </td>
                <td> {{ $plate->is_visible }} </td>
                <td> {{ $plate->restaurant->name }} </td>
                <td>
                  <a href="{{ route('admin.plates.show',$plate) }}" type="button" class="btn btn-secondary btn-sm">Mostra</a>
                </td>
                <td>
                  <form action="{{ route('admin.plates.destroy',$plate) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Cancella" class="btn btn-danger btn-sm">
                  </form>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>    
  </section>
@endsection