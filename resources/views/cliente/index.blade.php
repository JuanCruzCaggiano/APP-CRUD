@extends('theme.base')
@section('content')
    <div class="container py-5 text-center">
        <h1>Listado de Clientes</h1>
        <a href="{{route('cliente.create', [])}}" class="btn btn-primary">Crear Cliente</a>

        @if(Session::has('mensaje'))
            <div class="alert alert-info my-5">{{Session::get('mensaje')}}</div>
        @endif

        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                <tr>
                    <td>{{$cliente->name}}</td>
                    <td>{{$cliente->deuda}}</td>
                    <td>
                        <a href="{{route('cliente.edit', $cliente)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('cliente.destroy', $cliente)}}" method="POST" class="d-inline">    
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('El cliente se eliminará de forma definitiva. ¿Desea continuar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No hay registros que mostrar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if ($clientes->count())
            {{$clientes->links()}}
        @endif
    </div>
@endsection
