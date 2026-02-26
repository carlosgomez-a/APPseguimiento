@extends('adminlte::page')

@section('title', 'Tipos de Documentos')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Lista de Tipos de Documentos</h3>
            <a href="{{ route('tiposdocumentos.create') }}" class="btn btn-primary">
                Nuevo Tipo
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
                    <th>Denominación</th>
                    <th>Observaciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tiposdocumentos as $tipo)
                    <tr>
                        <td>{{ $tipo->NIS }}</td>
                        <td>{{ $tipo->Denominacion }}</td>
                        <td>{{ $tipo->Observaciones }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
