@extends('adminlte::page')

@section('title', 'Detalle EPS')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle EPS</h3>
        </div>

        <div class="card-body">
            <p><strong>Número Documento:</strong> {{ $eps->NumeroDoc }}</p>
            <p><strong>Denominación:</strong> {{ $eps->Denominacion }}</p>
            <p><strong>Observaciones:</strong> {{ $eps->Observaciones }}</p>

            @if($eps->EpsPDF)
                <a href="{{ asset('storage/pdfs/' . $eps->EpsPDF) }}"
                   target="_blank" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Ver PDF
                </a>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ route('eps.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
