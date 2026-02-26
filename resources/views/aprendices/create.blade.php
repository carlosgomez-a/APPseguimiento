@extends('adminlte::page')

@section('title', 'Crear Aprendiz')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Aprendiz</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('aprendices.store') }}">
                @csrf

                <div class="form-group">
                    <label>Número Documento</label>
                    <input type="text" name="NumeroDoc" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" name="Nombres" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" name="Apellidos" class="form-control" required>
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

                <div class="form-group">
                    <label>Correo Personal</label>
                    <input type="email" name="CorreoPersonal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Sexo</label>
                    <select name="Sexo" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Fecha Nacimiento</label>
                    <input type="date" name="FechaNacimiento" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tipo Documento (NIS)</label>
                    <input type="number" name="tbltiposdocumentos_NIS" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>EPS (NIS)</label>
                    <input type="number" name="tbleps_NIS" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Ficha Caracterización (NIS)</label>
                    <input type="number" name="tblfichascaracterizacion_NIS" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>
        </div>
    </div>
@stop
