@extends('adminlte::page')

@section('title', 'Centros de Formación')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Lista de Centros de Formación</h3>
            <a href="{{ route('centroformacion.create') }}" class="btn btn-primary">
                Nuevo Centro
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
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Dirección</th>
                    <th>Observaciones</th>
                    <th>Regional</th>
                </tr>
                </thead>
                <tbody>
                @foreach($centroformacion as $centro)
                    <tr>
                        <td>{{ $centro->NIS }}</td>
                        <td>{{ $centro->Codigo }}</td>
                        <td>{{ $centro->Denominacion }}</td>
                        <td>{{ $centro->Direccion }}</td>
                        <td>{{ $centro->Observaciones }}</td>
                        <td>{{ $centro->tblregionales_NIS }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
