@extends('adminlte::page')

@section('title', 'Crear Instructor')

@section('content')
    <div class="card">
        <div class="card-header"><h3>Crear Instructor</h3></div>
        <div class="card-body">
            {{-- Mostramos errores de validación si existen --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('instructores.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- 1. TIPO DE DOCUMENTO DESDE RELACIÓN --}}
                    <div class="col-md-4 form-group">
                        <label>Tipo de Documento</label>
                        <select name="tbltiposdocumentos_NIS" class="form-control" required>
                            <option value="">Seleccione el tipo...</option>
                            @foreach($tiposdocumentos as $tipo)
                                <option value="{{ $tipo->NIS }}">{{ $tipo->Denominacion }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">El ID y sigla se guardarán automáticamente.</small>
                    </div>

                    <div class="col-md-8 form-group">
                        <label>Número de Documento</label>
                        <input type="text" name="NumeroDoc" class="form-control" value="{{ old('NumeroDoc') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Nombres</label>
                        <input type="text" name="Nombres" class="form-control" value="{{ old('Nombres') }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Apellidos</label>
                        <input type="text" name="Apellidos" class="form-control" value="{{ old('Apellidos') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="Direccion" class="form-control" value="{{ old('Direccion') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Correo Institucional</label>
                        <input type="email" name="CorreoInstitucional" class="form-control" value="{{ old('CorreoInstitucional') }}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Correo Personal</label>
                        <input type="email" name="CorreoPersonal" class="form-control" value="{{ old('CorreoPersonal') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Teléfono</label>
                        <input type="text" name="Telefono" class="form-control" value="{{ old('Telefono') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Fecha Nacimiento</label>
                        <input type="date" name="FechaNacimiento" class="form-control" value="{{ old('FechaNacimiento') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Sexo</label>
                        <select name="Sexo" class="form-control" required>
                            <option value="M" {{ old('Sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('Sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    {{-- 2. EPS --}}
                    <div class="col-md-6 form-group">
                        <label>EPS</label>
                        <select name="tbleps_NIS" class="form-control" required>
                            <option value="">Seleccione EPS...</option>
                            @foreach($eps as $e)
                                <option value="{{ $e->NIS }}" {{ old('tbleps_NIS') == $e->NIS ? 'selected' : '' }}>
                                    {{ $e->Denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- 3. ROL ADMINISTRATIVO --}}
                    <div class="col-md-6 form-group">
                        <label>Rol Administrativo</label>
                        <select name="tblrolesadministrativos_NIS" class="form-control" required>
                            <option value="">Seleccione Rol...</option>
                            @foreach($roles as $r)
                                <option value="{{ $r->NIS }}" {{ old('tblrolesadministrativos_NIS') == $r->NIS ? 'selected' : '' }}>
                                    {{ $r->Descripcion}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>PDF Instructor</label>
                    <input type="file" name="InstructoresPDF" class="form-control" accept="application/pdf" required>
                </div>

                <hr>
                <button type="submit" class="btn btn-primary">Guardar Instructor</button>
                <a href="{{ route('instructores.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
