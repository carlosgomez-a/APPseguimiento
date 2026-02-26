@extends('adminlte::page')

@section('title', 'Crear Instructor')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Instructor</h3>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('instructores.store') }}">
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
                    <label>Sexo (1 = Masculino, 2 = Femenino)</label>
                    <input type="number" name="Sexo" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Fecha de Nacimiento</label>
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
                    <label>Rol Administrativo (NIS)</label>
                    <input type="number" name="tblrolesadministrativos_NIS" class="form-control" required>
                </div>

                <br>

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>
        </div>
    </div>
@stop
