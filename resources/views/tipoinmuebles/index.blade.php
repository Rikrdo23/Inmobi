@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Tipo de Inmueble</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/tipo_inmuebles/create') }}" class="btn btn-sm btn-primary">Nuevo tipo de inmueble</a>
                </div>
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
                        <th scope="col">Descripción</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipo_inmuebles as $tipo_inmueble)
                        <tr>
                            <th scope="row">
                                {{ $tipo_inmueble->name }}
                            </th>
                            <td>
                                {{ $tipo_inmueble->description }}
                            </td>
                            <td>
                                <form action="{{ url('/tipo_inmuebles/' . $tipo_inmueble->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/tipo_inmuebles/' . $tipo_inmueble->id . '/edit') }}"
                                        class="btn btn-sm btn-primary">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
