@extends('adminlte::page')

@section('title', 'Crear Rol Administrativo')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Rol Administrativo</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('rolesadministrativos.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" name="Descripcion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>PDF</label>
                    <input type="file" name="RolesadministrativosPDF" class="form-control" accept="application/pdf" required>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
