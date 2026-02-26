@extends('adminlte::page')

@section('title', 'Detalle Alternativa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Detalle de Alternativa</h3>
        </div>

        <div class="card-body">
            <p><strong>NIS:</strong> {{ $alternativasep->NIS }}</p>
            <p><strong>Nombre:</strong> {{ $alternativasep->Nombre }}</p>
            <p><strong>Descripción:</strong> {{ $alternativasep->Descripcion }}</p>

            <a href="{{ route('alternativasep.index') }}" class="btn btn-secondary">
                Volver
            </a>
        </div>
    </div>
@stop
