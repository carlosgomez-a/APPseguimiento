@extends('adminlte::page')

@section('title', 'Detalle Centro')

@section('content')
    <div class="card">
        <div class="card-header"><h3>Detalle del Centro de Formación</h3></div>
        <div class="card-body">
            <p><strong>Código:</strong> {{ $centro->Codigo }}</p>
            <p><strong>Denominación:</strong> {{ $centro->Denominacion }}</p>
            <p><strong>Dirección:</strong> {{ $centro->Direccion }}</p>
            <p><strong>Observaciones:</strong> {{ $centro->Observaciones ?? 'N/A' }}</p>

            @if($centro->CentroformacionPDF)
                <p><strong>Documento:</strong>
                    <a href="{{ asset('storage/pdfs_centros/' . $centro->CentroformacionPDF) }}" target="_blank" class="btn btn-danger btn-sm">Abrir PDF</a>
                </p>
            @endif
        </div>
        <div class="card-footer"><a href="{{ route('centroformacion.index') }}" class="btn btn-secondary">Volver</a></div>
    </div>
@stop
