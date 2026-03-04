@extends('adminlte::page')

@section('title', 'Detalle Aprendiz')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle del Aprendiz</h3>
        </div>

        <div class="card-body">

            <p><strong>Documento:</strong> {{ $aprendiz->NumeroDoc }}</p>
            <p><strong>Nombres:</strong> {{ $aprendiz->Nombres }}</p>
            <p><strong>Apellidos:</strong> {{ $aprendiz->Apellidos }}</p>
            <p><strong>Dirección:</strong> {{ $aprendiz->Direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $aprendiz->Telefono }}</p>
            <p><strong>Correo Institucional:</strong> {{ $aprendiz->CorreoInstitucional }}</p>
            <p><strong>Correo Personal:</strong> {{ $aprendiz->CorreoPersonal }}</p>
            <p><strong>Sexo:</strong> {{ $aprendiz->Sexo }}</p>
            <p><strong>Fecha Nacimiento:</strong> {{ $aprendiz->FechaNacimiento }}</p>

            <hr>

            @if($aprendiz->AprendicesPDF)
                <a href="{{ asset('storage/pdfs/' . $aprendiz->AprendicesPDF) }}"
                   target="_blank"
                   class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Ver PDF
                </a>
            @else
                <span class="badge badge-secondary">Sin archivo PDF</span>
            @endif

        </div>

        <div class="card-footer">
            <a href="{{ route('aprendices.index') }}"
               class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
