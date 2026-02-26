@extends('adminlte::page')

@section('title', 'Aprendices')

@section('content')
    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Lista de Aprendices</h3>

            <a href="{{ route('aprendices.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nuevo Aprendiz
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm text-center">

                    <thead class="thead-dark">
                    <tr>
                        <th>NIS</th>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo Inst.</th>
                        <th>Correo Pers.</th>
                        <th>Sexo</th>
                        <th>Fecha Nac.</th>
                        <th>Tipo Doc</th>
                        <th>EPS</th>
                        <th>Ficha</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($aprendices as $aprendiz)
                        <tr>
                            <td>{{ $aprendiz->NIS }}</td>
                            <td>{{ $aprendiz->NumeroDoc }}</td>
                            <td>{{ $aprendiz->Nombres }}</td>
                            <td>{{ $aprendiz->Apellidos }}</td>
                            <td>{{ $aprendiz->Direccion }}</td>
                            <td>{{ $aprendiz->Telefono }}</td>
                            <td class="text-break">{{ $aprendiz->CorreoInstitucional }}</td>
                            <td class="text-break">{{ $aprendiz->CorreoPersonal }}</td>
                            <td>{{ $aprendiz->Sexo }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($aprendiz->FechaNacimiento)->format('d/m/Y') }}
                            </td>
                            <td>{{ $aprendiz->tbltiposdocumentos_NIS }}</td>
                            <td>{{ $aprendiz->tbleps_NIS }}</td>
                            <td>{{ $aprendiz->tblfichascaracterizacion_NIS }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center text-muted">
                                No hay aprendices registrados
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@stop
