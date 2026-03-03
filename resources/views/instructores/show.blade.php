@extends('adminlte::page')

@section('title', 'Detalle Instructor')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle del Instructor</h3>
        </div>

        <div class="card-body">
            <p><strong>Documento:</strong> {{ $instructore->NumeroDoc }}</p>
            <p><strong>Nombre:</strong> {{ $instructore->Nombres }} {{ $instructore->Apellidos }}</p>
            <p><strong>Dirección:</strong> {{ $instructore->Direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $instructore->Telefono }}</p>
            <p><strong>Correo Institucional:</strong> {{ $instructore->CorreoInstitucional }}</p>
            <p><strong>Correo Personal:</strong> {{ $instructore->CorreoPersonal }}</p>
            <p><strong>Sexo:</strong> {{ $instructore->Sexo }}</p>
            <p><strong>Fecha Nacimiento:</strong> {{ $instructore->FechaNacimiento }}</p>
        </div>

        <div class="card-footer">
            <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
