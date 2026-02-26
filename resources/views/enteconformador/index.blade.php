@extends('adminlte::page')

@section('title', 'Ente Conformador')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Lista de Entes Conformadores</h3>

            <a href="{{ route('enteconformador.create') }}" class="btn btn-primary">
                Nuevo Ente
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
                    <th>Tipo Doc</th>
                    <th>Número Doc</th>
                    <th>Razón Social</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                </tr>
                </thead>

                <tbody>
                @foreach($enteconformador as $ente)
                    <tr>
                        <td>{{ $ente->NIS }}</td>
                        <td>{{ $ente->TipoDoc }}</td>
                        <td>{{ $ente->NumeroDoc }}</td>
                        <td>{{ $ente->RazonSocial }}</td>
                        <td>{{ $ente->Direccion }}</td>
                        <td>{{ $ente->Telefono }}</td>
                        <td>{{ $ente->CorreoInstitucional }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop
