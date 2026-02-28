@extends('adminlte::page')

@section('title', 'Editar EPS')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar EPS</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('eps.update', $eps->NIS) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Número Documento</label>
                    <input type="text" name="NumeroDoc" class="form-control"
                           value="{{ old('NumeroDoc', $eps->NumeroDoc) }}">
                </div>

                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text" name="Denominacion" class="form-control"
                           value="{{ old('Denominacion', $eps->Denominacion) }}">
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" name="Observaciones" class="form-control"
                           value="{{ old('Observaciones', $eps->Observaciones) }}">
                </div>

                <div class="form-group">
                    <label>Nuevo PDF (opcional)</label>
                    <input type="file" name="EpsPDF" class="form-control" accept="application/pdf">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sync"></i> Actualizar
                </button>

                <a href="{{ route('eps.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
