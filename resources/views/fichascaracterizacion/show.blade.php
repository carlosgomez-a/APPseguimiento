@extends('adminlte::page')

@section('title', 'Detalle de Ficha')

@section('content')
    <div class="card">
        <div class="card-header"><h3>Ficha: {{ $ficha->Codigo }}</h3></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Denominación:</strong> {{ $ficha->Denominacion }}</p>
                    <p><strong>Cupo:</strong> {{ $ficha->Cupo }}</p>
                    <p><strong>Centro:</strong> {{ $ficha->centroformacion->Denominacion ?? 'No asignado' }}</p>
                    <p><strong>Programa:</strong> {{ $ficha->programaformacion->Denominacion ?? 'No asignado' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Fecha Inicio:</strong> {{ $ficha->FechaInicio }}</p>
                    <p><strong>Fecha Fin:</strong> {{ $ficha->FechaFin }}</p>
                    <p><strong>Observaciones:</strong> {{ $ficha->Observaciones }}</p>
                    @if($ficha->FichascaracterizacionPDF)
                        <a href="{{ asset('storage/pdfs_fichas/' . $ficha->FichascaracterizacionPDF) }}" target="_blank" class="btn btn-outline-danger">
                            <i class="fas fa-file-pdf"></i> Ver Documento PDF
                        </a>
                    @endif
                </div>
            </div>
            <hr>
            <a href="{{ route('fichascaracterizacion.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@stop
