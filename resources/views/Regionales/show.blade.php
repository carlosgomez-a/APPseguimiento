@extends('adminlte::page')

@section('title', 'Detalle Regional')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle de la Regional</h3>
        </div>

        <div class="card-body">
            <p><strong>Código:</strong> {{ $regional->Codigo }}</p>
            <p><strong>Denominación:</strong> {{ $regional->Denominacion }}</p>
            <p><strong>Observaciones:</strong> {{ $regional->Observaciones }}</p>

            @if($regional->RegionalesPDF)
                <a href="{{ asset('storage/pdfs/' . $regional->RegionalesPDF) }}"
                   target="_blank"
                   class="btn btn-danger">
                    Ver PDF
                </a>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
