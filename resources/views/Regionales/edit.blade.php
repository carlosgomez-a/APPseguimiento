@extends('adminlte::page')

@section('title', 'Editar Regional')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Regional</h3>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('regionales.update', $regional->NIS) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Código</label>
                    <input type="number"
                           name="Codigo"
                           class="form-control"
                           value="{{ old('Codigo', $regional->Codigo) }}">
                </div>

                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text"
                           name="Denominacion"
                           class="form-control"
                           value="{{ old('Denominacion', $regional->Denominacion) }}">
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text"
                           name="Observaciones"
                           class="form-control"
                           value="{{ old('Observaciones', $regional->Observaciones) }}">
                </div>

                <div class="form-group">
                    <label>Nuevo PDF (opcional)</label>
                    <input type="file"
                           name="RegionalesPDF"
                           class="form-control"
                           accept="application/pdf">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('regionales.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
