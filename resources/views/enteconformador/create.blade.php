@extends('adminlte::page')

@section('title', 'Crear Ente Conformador')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Ente Conformador</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('enteconformador.store') }}">
                @csrf

                <div class="form-group">
                    <label>Tipo Documento</label>
                    <input type="number" name="TipoDoc" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Número Documento</label>
                    <input type="number" name="NumeroDoc" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Razón Social</label>
                    <input type="text" name="RazonSocial" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="Direccion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="Telefono" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Correo Institucional</label>
                    <input type="email" name="CorreoInstitucional" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('enteconformador.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
