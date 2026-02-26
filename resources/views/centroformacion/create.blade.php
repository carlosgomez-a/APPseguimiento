@extends('adminlte::page')

@section('title', 'Crear Centro de Formación')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Centro de Formación</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('centroformacion.store') }}">
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
                    <label>Dirección</label>
                    <input type="text" name="Direccion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" name="Observaciones" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Regional (NIS)</label>
                    <input type="number" name="tblregionales_NIS" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('centroformacion.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
