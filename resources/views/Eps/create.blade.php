@extends('adminlte::page')

@section('title', 'Crear EPS')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear EPS</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('eps.store') }}">
                @csrf

                <div class="form-group">
                    <label>Número Documento</label>
                    <input type="text" name="NumeroDoc" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text" name="Denominacion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" name="Observaciones" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('eps.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
