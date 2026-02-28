@extends('adminlte::page')

@section('title', 'Detalle Subalternativa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle de la Subalternativa</h3>
        </div>

        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $subalternativasep->Nombre }}</p>
            <p><strong>Descripción:</strong> {{ $subalternativasep->Descripcion }}</p>

            @if($subalternativasep->Subalternativasep)
                <a href="{{ asset('storage/pdfs/' . $subalternativasep->Subalternativasep) }}"
                   target="_blank"
                   class="btn btn-danger">
                    Ver PDF
                </a>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ route('subalternativasep.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
