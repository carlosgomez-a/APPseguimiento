@extends('adminlte::page')

@section('title', 'Detalle Rol')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle del Rol</h3>
        </div>

        <div class="card-body">
            <p><strong>NIS:</strong> {{ $rolesadministrativos->NIS }}</p>
            <p><strong>Descripción:</strong> {{ $rolesadministrativos->Descripcion }}</p>

            @if($rolesadministrativos->RolesadministrativosPDF)
                <a href="{{ asset('storage/pdfs/' . $rolesadministrativos->RolesadministrativosPDF) }}"
                   target="_blank"
                   class="btn btn-danger">
                    Ver PDF
                </a>
            @endif
        </div>

        <div class="card-footer">
            <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@stop
