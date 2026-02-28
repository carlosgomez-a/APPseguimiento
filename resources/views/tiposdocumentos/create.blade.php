@extends('adminlte::page')

@section('title', 'Crear Tipo de Documento')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Tipo de Documento</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('tiposdocumentos.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text" name="Denominacion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" name="Observaciones" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>PDF</label>
                    <input type="file" name="TiposdocumentosPDF" class="form-control" accept="application/pdf" required>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
