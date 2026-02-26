@extends('adminlte::page')

@section('title', 'Crear Ficha de Caracterización')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Ficha de Caracterización</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('fichascaracterizacion.store') }}">
                @csrf

                <div class="form-group">
                    <label>Código</label>
                    <input type="number" name="Codigo" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text" name="Denominacion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Cupo</label>
                    <input type="number" name="Cupo" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Fecha Inicio</label>
                    <input type="date" name="FechaIncicio" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Fecha Fin</label>
                    <input type="date" name="FechaFin" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" name="Observaciones" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Centro de Formación (NIS)</label>
                    <input type="number" name="tblcentroformacion_NIS" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Programa de Formación (NIS)</label>
                    <input type="number" name="tblprogamasdeformacion_NIS" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('fichascaracterizacion.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
