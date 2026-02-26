@extends('adminlte::page')

@section('title', 'Programas de Formación')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Lista de Programas de Formación</h3>
            <a href="{{ route('programasdeformacion.create') }}" class="btn btn-primary">
                Nuevo Programa
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
                    <th>Observaciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($programas as $programa)
                    <tr>
                        <td>{{ $programa->NIS }}</td>
                        <td>{{ $programa->Codigo }}</td>
                        <td>{{ $programa->Denominacion }}</td>
                        <td>{{ $programa->Observaciones }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
