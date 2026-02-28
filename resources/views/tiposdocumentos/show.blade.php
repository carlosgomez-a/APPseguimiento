@extends('adminlte::page')

@section('title', 'Detalle Tipo de Documento')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle</h3>
        </div>

        <div class="card-body">
            <p><strong>NIS:</strong> {{ $tiposdocumentos->NIS }}</p>
            <p><strong>Denominación:</strong> {{ $tiposdocumentos->Denominacion }}</p>
            <p><strong>Observaciones:</strong> {{ $tiposdocumentos->Observaciones }}</p>

            @if($tiposdocumentos->TiposdocumentosPDF)
                <a href="{{ asset('storage/pdfs/' . $tiposdocumentos->TiposdocumentosPDF) }}"
                   target="_blank"
                   class="btn btn-danger">
                    Ver PDF
                </a>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
