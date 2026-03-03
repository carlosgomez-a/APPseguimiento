@extends('adminlte::page')

@section('title', 'Editar Programa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Programa</h3>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('programasdeformacion.update', $programa->NIS) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Código</label>
                    <input type="text"
                           name="Codigo"
                           class="form-control"
                           value="{{ $programa->Codigo }}">
                </div>

                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text"
                           name="Denominacion"
                           class="form-control"
                           value="{{ $programa->Denominacion }}">
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text"
                           name="Observaciones"
                           class="form-control"
                           value="{{ $programa->Observaciones }}">
                </div>

                <div class="form-group">
                    <label>Nuevo PDF (opcional)</label>
                    <input type="file"
                           name="ProgramasdeformacionPDF"
                           class="form-control"
                           accept="application/pdf">
                </div>

                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>

                <a href="{{ route('programasdeformacion.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
