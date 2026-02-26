@extends('adminlte::page')

@section('title', 'Crear Ficha')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Ficha de Caracterización</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('fichascaracterizacion.store') }}" method="POST">
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
                    <input type="date" name="FechaInicio" class="form-control" required>
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
                    <label>Centro Formación (NIS)</label>
                    <input type="number" name="tblcentroformacion_NIS" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Programa Formación (NIS)</label>
                    <input type="number" name="tblprogramasdeformacion_NIS" class="form-control" required>
                </div>

                <br>

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>
            </form>
        </div>
    </div>
@endsection
