@extends('adminlte::page')

@section('title', 'rolesadministrativos')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Roles administrativos</h3>
            <a href="{{ route('rolesadministrativos.create') }}" class="btn btn-primary">
                Nuevo Rol
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>NIS</th>
                    <th>Description</th>

                </tr>
                </thead>
                <tbody>
                @foreach($rolesadministrativos as $rol)
                    <tr>
                        <td>{{ $rol->NIS }}</td>
                        <td>{{ $rol->Descripcion }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
