@extends('adminlte::page')

@section('title', 'Crear Ficha')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Ficha de Caracterización</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('fichascaracterizacion.store') }}" enctype="multipart/form-data">
                @csrf

                <input type="number" name="Codigo" class="form-control mb-2" placeholder="Código" required>
                <input type="text" name="Denominacion" class="form-control mb-2" placeholder="Denominación" required>
                <input type="number" name="Cupo" class="form-control mb-2" placeholder="Cupo" required>
                <input type="date" name="FechaInicio" class="form-control mb-2" required>
                <input type="date" name="FechaFin" class="form-control mb-2" required>
                <input type="text" name="Observaciones" class="form-control mb-2" placeholder="Observaciones">
                <input type="number" name="tblcentroformacion_NIS" class="form-control mb-2" placeholder="Centro Formación NIS" required>
                <input type="number" name="tblprogramasdeformacion_NIS" class="form-control mb-2" placeholder="Programa Formación NIS" required>

                <div class="custom-file mb-3">
                    <input type="file" name="FichascaracterizacionEPS" class="custom-file-input" required>
                    <label class="custom-file-label">Elegir PDF...</label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>

                <a href="{{ route('fichascaracterizacion.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
