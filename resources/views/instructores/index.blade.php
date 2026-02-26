@extends('adminlte::page')

@section('title', 'Instructores')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Lista de Instructores</h3>
            <a href="{{ route('instructores.create') }}" class="btn btn-primary">
                Nuevo Instructor
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>NIS</th>
                        <th>TipoDoc</th>
                        <th>NumeroDoc</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>CorreoInstitucional</th>
                        <th>CorreoPersonal</th>
                        <th>Sexo</th>
                        <th>FechaNacimiento</th>
                        <th>tbltiposdocumentos_NIS</th>
                        <th>tbleps_NIS</th>
                        <th>tblrolesadministrativos_NIS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($instructores as $instructor)
                        <tr>
                            <td>{{ $instructor->NIS }}</td>
                            <td>{{ $instructor->TipoDoc }}</td>
                            <td>{{ $instructor->NumeroDoc }}</td>
                            <td>{{ $instructor->Nombres }}</td>
                            <td>{{ $instructor->Apellidos }}</td>
                            <td>{{ $instructor->Direccion }}</td>
                            <td>{{ $instructor->Telefono }}</td>
                            <td>{{ $instructor->CorreoInstitucional }}</td>
                            <td>{{ $instructor->CorreoPersonal }}</td>
                            <td>{{ $instructor->Sexo }}</td>
                            <td>{{ $instructor->FechaNacimiento }}</td>
                            <td>{{ $instructor->tbltiposdocumentos_NIS }}</td>
                            <td>{{ $instructor->tbleps_NIS }}</td>
                            <td>{{ $instructor->tblrolesadministrativos_NIS }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@stop
