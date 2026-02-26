@extends('adminlte::page')

@section('title', 'Fichas de Caracterización')

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Lista de Fichas de Caracterización</h3>

            <a href="{{ route('fichascaracterizacion.create') }}" class="btn btn-primary">
                Nueva Ficha
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>NIS</th>
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Cupo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Observaciones</th>
                    <th>Centro (NIS)</th>
                    <th>Programa (NIS)</th>
                </tr>
                </thead>
                <tbody>
                @forelse($fichascaracterizacion as $ficha)
                    <tr>
                        <td>{{ $ficha->NIS }}</td>
                        <td>{{ $ficha->Codigo }}</td>
                        <td>{{ $ficha->Denominacion }}</td>
                        <td>{{ $ficha->Cupo }}</td>
                        <td>{{ $ficha->FechaInicio }}</td>
                        <td>{{ $ficha->FechaFin }}</td>
                        <td>{{ $ficha->Observaciones }}</td>
                        <td>{{ $ficha->tblcentroformacion_NIS }}</td>
                        <td>{{ $ficha->tblprogramasdeformacion_NIS }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">
                            No hay fichas registradas
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>

@endsection
