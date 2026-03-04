@extends('adminlte::page')

@section('title', 'Editar Aprendiz')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Aprendiz</h3>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('aprendices.update', $aprendiz->NIS) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Documento</label>
                    <input type="text"
                           name="NumeroDoc"
                           class="form-control"
                           value="{{ old('NumeroDoc', $aprendiz->NumeroDoc) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text"
                           name="Nombres"
                           class="form-control"
                           value="{{ old('Nombres', $aprendiz->Nombres) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text"
                           name="Apellidos"
                           class="form-control"
                           value="{{ old('Apellidos', $aprendiz->Apellidos) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text"
                           name="Direccion"
                           class="form-control"
                           value="{{ old('Direccion', $aprendiz->Direccion) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text"
                           name="Telefono"
                           class="form-control"
                           value="{{ old('Telefono', $aprendiz->Telefono) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Correo Institucional</label>
                    <input type="email"
                           name="CorreoInstitucional"
                           class="form-control"
                           value="{{ old('CorreoInstitucional', $aprendiz->CorreoInstitucional) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Correo Personal</label>
                    <input type="email"
                           name="CorreoPersonal"
                           class="form-control"
                           value="{{ old('CorreoPersonal', $aprendiz->CorreoPersonal) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Fecha Nacimiento</label>
                    <input type="date"
                           name="FechaNacimiento"
                           class="form-control"
                           value="{{ old('FechaNacimiento', $aprendiz->FechaNacimiento) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Sexo</label>
                    <select name="Sexo" class="form-control" required>
                        <option value="M" {{ $aprendiz->Sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ $aprendiz->Sexo == 'F' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>

                {{-- 🔥 FK Tipo Documento --}}
                <div class="form-group">
                    <label>Tipo Documento</label>
                    <select name="tbltiposdocumentos_NIS" class="form-control" required>
                        @foreach($tiposdocumentos as $tipo)
                            <option value="{{ $tipo->NIS }}"
                                {{ $aprendiz->tbltiposdocumentos_NIS == $tipo->NIS ? 'selected' : '' }}>
                                {{ $tipo->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- 🔥 FK EPS --}}
                <div class="form-group">
                    <label>EPS</label>
                    <select name="tbleps_NIS" class="form-control" required>
                        @foreach($eps as $e)
                            <option value="{{ $e->NIS }}"
                                {{ $aprendiz->tbleps_NIS == $e->NIS ? 'selected' : '' }}>
                                {{ $e->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- 🔥 FK Ficha --}}
                <div class="form-group">
                    <label>Ficha</label>
                    <select name="tblfichascaracterizacion_NIS" class="form-control" required>
                        @foreach($fichas as $f)
                            <option value="{{ $f->NIS }}"
                                {{ $aprendiz->tblfichascaracterizacion_NIS == $f->NIS ? 'selected' : '' }}>
                                {{ $f->Codigo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nuevo PDF (opcional)</label>
                    <input type="file"
                           name="AprendicesPDF"
                           class="form-control"
                           accept="application/pdf">
                </div>

                @if($aprendiz->AprendicesPDF)
                    <div class="mb-3">
                        <label>PDF Actual:</label><br>
                        <a href="{{ asset('storage/pdfs/' . $aprendiz->AprendicesPDF) }}"
                           target="_blank"
                           class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> Ver PDF
                        </a>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>

                <a href="{{ route('aprendices.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>

            </form>
        </div>
    </div>
@stop
