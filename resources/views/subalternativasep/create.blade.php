@extends('adminlte::page')

@section('title', 'Crear Subalternativa De Etapa Productiva')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Subalternativa De Etapa Productiva</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('subalternativasep.store') }}">
                @csrf

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="Nombre" class="form-control" required>
                </div>

                <label>Descripción</label>
                <input type="text" name="Descripcion" class="form-control" required>

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('subalternativasep.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
