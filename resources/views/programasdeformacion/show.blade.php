@extends('adminlte::page')

@section('title', 'Detalle Programa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle del Programa</h3>
        </div>

        <div class="card-body">
            <p><strong>Código:</strong> {{ $programa->Codigo }}</p>
            <p><strong>Denominación:</strong> {{ $programa->Denominacion }}</p>
            <p><strong>Observaciones:</strong> {{ $programa->Observaciones }}</p>

            @if($programa->ProgramasdeformacionPDF)
                <a href="{{ asset('storage/pdfs/'.$programa->ProgramasdeformacionPDF) }}"
                   target="_blank"
                   class="btn btn-danger">
                    Ver PDF
                </a>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ route('programasdeformacion.index') }}"
               class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
