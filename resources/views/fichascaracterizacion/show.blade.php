@extends('adminlte::page')

@section('title', 'Detalle Ficha')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle Ficha</h3>
        </div>

        <div class="card-body">
            <p><strong>Código:</strong> {{ $ficha->Codigo }}</p>
            <p><strong>Denominación:</strong> {{ $ficha->Denominacion }}</p>
            <p><strong>Cupo:</strong> {{ $ficha->Cupo }}</p>
            <p><strong>Fechas:</strong> {{ $ficha->FechaInicio }} - {{ $ficha->FechaFin }}</p>
            <p><strong>Observaciones:</strong> {{ $ficha->Observaciones }}</p>

            @if($ficha->FichascaracterizacionEPS)
                <a href="{{ asset('storage/pdfs/' . $ficha->FichascaracterizacionEPS) }}"
                   target="_blank" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Ver PDF
                </a>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ route('fichascaracterizacion.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
