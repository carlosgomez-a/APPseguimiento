@extends('adminlte::page')

@section('title', 'Detalle Alternativa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle de la Alternativa</h3>
        </div>

        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $alternativasep->Nombre }}</p>
            <p><strong>Descripción:</strong> {{ $alternativasep->Descripcion }}</p>

            @if($alternativasep->AlternativasepPDF)
                <a href="{{ asset('storage/pdfs/' . $alternativasep->AlternativasepPDF) }}"
                   target="_blank"
                   class="btn btn-danger">
                    Ver PDF
                </a>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ route('alternativasep.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
