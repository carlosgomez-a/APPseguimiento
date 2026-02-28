@extends('adminlte::page')

@section('title', 'Crear Subalternativa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Subalternativa</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('subalternativasep.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="Nombre" class="form-control" value="{{ old('Nombre') }}" required>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" name="Descripcion" class="form-control" value="{{ old('Descripcion') }}" required>
                </div>

                <div class="form-group">
                    <label>PDF</label>
                    <div class="custom-file">
                        <input type="file" name="Subalternativasep" class="custom-file-input" accept="application/pdf" required>
                        <label class="custom-file-label">Elegir PDF...</label>
                    </div>
                </div>

                <br>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>

                <a href="{{ route('subalternativasep.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
