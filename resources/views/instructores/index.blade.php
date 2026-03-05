@extends('adminlte::page')

@section('title', 'Instructores')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">Lista de Instructores</h3>
            <a href="{{ route('instructores.create') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-plus"></i> Nuevo Instructor
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
                    <th>Documento</th>
                    <th>Nombre Completo</th>
                    <th>Teléfono</th>
                    <th>Correo Institucional</th>
                    <th>Sexo</th>
                    <th>Tipo Documento</th>
                    <th>EPS</th>
                    <th>Rol Administrativo</th>
                    <th class="text-center">PDF</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($instructores as $instructor)
                    <tr>
                        <td>{{ $instructor->NumeroDoc }}</td>
                        <td>{{ $instructor->Nombres }} {{ $instructor->Apellidos }}</td>
                        <td>{{ $instructor->Telefono }}</td>
                        <td>{{ $instructor->CorreoInstitucional }}</td>
                        <td>{{ $instructor->Sexo }}</td>
                        <td>{{ $instructor->tiposdocumentos->Denominacion ?? 'Sin dato' }}</td>
                        <td>{{ $instructor->eps->Denominacion ?? 'Sin dato' }}</td>
                        <td>{{ $instructor->rolesadministrativos->Descripcion ?? 'Sin dato' }}</td>
                        <td class="text-center">
                            @if(!empty($instructor->InstructoresPDF))
                                <a href="{{ asset('storage/pdfs/' . $instructor->InstructoresPDF) }}"
                                   target="_blank" class="btn btn-danger btn-sm">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @else
                                <span class="badge badge-secondary">Sin archivo</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('instructores.show', $instructor->NIS) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('instructores.edit', $instructor->NIS) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('instructores.destroy', $instructor->NIS) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar instructor?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
