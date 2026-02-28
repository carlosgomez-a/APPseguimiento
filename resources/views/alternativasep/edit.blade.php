@extends('adminlte::page')

@section('title', 'Editar Alternativa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Alternativa</h3>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('alternativasep.update', $alternativasep->NIS) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text"
                           name="Nombre"
                           class="form-control"
                           value="{{ old('Nombre', $alternativasep->Nombre) }}">
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <input type="text"
                           name="Descripcion"
                           class="form-control"
                           value="{{ old('Descripcion', $alternativasep->Descripcion) }}">
                </div>

                <div class="form-group">
                    <label>Nuevo PDF (opcional)</label>
                    <input type="file"
                           name="AlternativasepPDF"
                           class="form-control"
                           accept="application/pdf">
                </div>

                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>

                <a href="{{ route('alternativasep.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
