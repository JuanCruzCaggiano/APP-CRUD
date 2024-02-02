@extends('theme.base')
@section('content')
    <div class="container py-5 text-center">

            @if(isset($cliente))
                <h1>Editar Cliente</h1>
            @else
                <h1>Crear Cliente</h1>
            @endif

            @if(isset($cliente))
                <form action="{{route('cliente.update', $cliente)}}" method="POST">
                @method('PUT')
            @else
                <form action="{{route('cliente.store')}}" method="POST">
            @endif
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre del Cliente" value="{{old('name') ?? @$cliente->name}}">
                <p class="form-text">Escriba el nombre del cliente</p>
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deuda" class="form-label">Saldo</label>
                <input type="number" name="deuda" class="form-control" placeholder="Saldo del Cliente" step="0.01" value="{{old('deuda') ?? @$cliente->deuda}}">
                <p class="form-text">Escriba el saldo del cliente</p>
                @error('deuda')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="comments" class="form-label">Comentarios</label>
                <textarea name="comments" class="form-control" cols="30" rows="4">{{old('comments') ?? @$cliente->comments}}</textarea>
                <p class="form-text">Escriba algunos comentarios</p>
                @error('comments')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            @if(isset($cliente))
                <button type="submit" class="btn btn-primary">Editar Cliente</button>
            @else
                <button type="submit" class="btn btn-primary">Guardar Cliente</button>
            @endif
        </form>
    </div>
@endsection
