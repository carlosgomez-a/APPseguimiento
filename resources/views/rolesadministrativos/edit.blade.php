@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Rol Administrativo</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('rolesadministrativos.update', $rolesadministrativos->NIS) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" name="Descripcion" class="form-control"
                           value="{{ $rolesadministrativos->Descripcion }}" required>
                </div>

                <div class="form-group">
                    <label>Reemplazar PDF (opcional)</label>
                    <input type="file" name="RolesadministrativosPDF" class="form-control" accept="application/pdf">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
