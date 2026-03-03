@extends('adminlte::page')

@section('title', 'Detalle Ente Conformador')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle del Ente Conformador</h3>
        </div>

        <div class="card-body">

            <p><strong>Tipo Documento:</strong> {{ $ente->TipoDoc }}</p>
            <p><strong>Número Documento:</strong> {{ $ente->NumeroDoc }}</p>
            <p><strong>Razón Social:</strong> {{ $ente->RazonSocial }}</p>
            <p><strong>Dirección:</strong> {{ $ente->Direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $ente->Telefono }}</p>
            <p><strong>Correo Institucional:</strong> {{ $ente->CorreoInstitucional }}</p>

            @if($ente->EnteconformadorPDF)
                <a href="{{ asset('storage/pdfs/'.$ente->EnteconformadorPDF) }}"
                   target="_blank"
                   class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Ver PDF
                </a>
            @endif

        </div>

        <div class="card-footer">
            <a href="{{ route('enteconformador.index') }}"
               class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
