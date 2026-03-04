@extends('adminlte::page')

@section('title', 'Detalle Instructor')

@section('content')
    <div class="card">
        <div class="card-header"><h3>Detalle del Instructor</h3></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Tipo y # Documento:</strong> {{ $instructor->TipoDoc }} {{ $instructor->NumeroDoc }}</p>
                    <p><strong>Nombres:</strong> {{ $instructor->Nombres }} {{ $instructor->Apellidos }}</p>
                    <p><strong>Dirección:</strong> {{ $instructor->Direccion }}</p>
                    <p><strong>Teléfono:</strong> {{ $instructor->Telefono }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Correo Inst:</strong> {{ $instructor->CorreoInstitucional }}</p>
                    <p><strong>Rol Administrativo:</strong> {{ $instructor->rolAdministrativo->Denominacion ?? 'N/A' }}</p>
                    <p><strong>Sexo:</strong> {{ $instructor->Sexo }}</p>
                    @if($instructor->InstructoresPDF)
                        <a href="{{ asset('storage/pdfs/' . $instructor->InstructoresPDF) }}" target="_blank" class="btn btn-danger">
                            <i class="fas fa-file-pdf"></i> Ver PDF Adjunto
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('instructores.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@stop
