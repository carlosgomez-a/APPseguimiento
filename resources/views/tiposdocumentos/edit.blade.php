@extends('adminlte::page')

@section('title', 'Editar Tipo de Documento')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Tipo de Documento</h3>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('tiposdocumentos.update', $tiposdocumentos->NIS) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text"
                           name="Denominacion"
                           class="form-control"
                           value="{{ old('Denominacion', $tiposdocumentos->Denominacion) }}">
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text"
                           name="Observaciones"
                           class="form-control"
                           value="{{ old('Observaciones', $tiposdocumentos->Observaciones) }}">
                </div>

                <div class="form-group">
                    <label>Nuevo PDF (opcional)</label>
                    <input type="file"
                           name="TiposdocumentosPDF"
                           class="form-control"
                           accept="application/pdf">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
