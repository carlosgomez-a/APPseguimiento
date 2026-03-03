@extends('adminlte::page')

@section('title', 'Editar Instructor')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Instructor</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('instructores.update', $instructore->NIS) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" name="Nombres" class="form-control"
                           value="{{ $instructore->Nombres }}">
                </div>

                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" name="Apellidos" class="form-control"
                           value="{{ $instructore->Apellidos }}">
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="Telefono" class="form-control"
                           value="{{ $instructore->Telefono }}">
                </div>

                <div class="form-group">
                    <label>Correo Institucional</label>
                    <input type="email" name="CorreoInstitucional" class="form-control"
                           value="{{ $instructore->CorreoInstitucional }}">
                </div>

                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>

                <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>
        </div>
    </div>
@stop
