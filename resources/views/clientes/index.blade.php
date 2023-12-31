@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Lsita de Clientes</h3>
                </div>
                {{-- <div class="col text-right">
                    <a href="{{ url('/propietarios/create') }}" class="btn btn-sm btn-primary">Nuevo tipo usuario</a>
                </div> --}}
            </div>
        </div>

        <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
        </div>

        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">C.I.</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <th scope="row">
                                {{ $cliente->name }}
                            </th>
                            <td>
                                {{ $cliente->email }}
                            </td>
                            <td>
                                {{ $cliente->cedula }}
                            </td>
                            <td>
                                {{ $cliente->role }}
                            </td>
                            <td>
                                {{ $cliente->account_number }}
                            </td>
                            <td>
                                <form action="{{ url('/clientes/' . $cliente->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/clientes/' . $cliente->id . '/edit') }}"
                                        class="btn btn-sm btn-primary">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body"> {{$clientes->links()}} </div>
    </div>
@endsection
