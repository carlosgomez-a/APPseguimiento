@extends('adminlte::page')

@section('title', 'Editar Ficha')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Ficha de Caracterización</h3>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('fichascaracterizacion.update', $ficha->NIS) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Código</label>
                    <input type="number" name="Codigo"
                           class="form-control"
                           value="{{ old('Codigo', $ficha->Codigo) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text" name="Denominacion"
                           class="form-control"
                           value="{{ old('Denominacion', $ficha->Denominacion) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Cupo</label>
                    <input type="number" name="Cupo"
                           class="form-control"
                           value="{{ old('Cupo', $ficha->Cupo) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Fecha Inicio</label>
                    <input type="date" name="FechaInicio"
                           class="form-control"
                           value="{{ old('FechaInicio', $ficha->FechaInicio) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Fecha Fin</label>
                    <input type="date" name="FechaFin"
                           class="form-control"
                           value="{{ old('FechaFin', $ficha->FechaFin) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" name="Observaciones"
                           class="form-control"
                           value="{{ old('Observaciones', $ficha->Observaciones) }}">
                </div>

                <div class="form-group">
                    <label>Centro Formación (NIS)</label>
                    <input type="number" name="tblcentroformacion_NIS"
                           class="form-control"
                           value="{{ old('tblcentroformacion_NIS', $ficha->tblcentroformacion_NIS) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Programa Formación (NIS)</label>
                    <input type="number" name="tblprogramasdeformacion_NIS"
                           class="form-control"
                           value="{{ old('tblprogramasdeformacion_NIS', $ficha->tblprogramasdeformacion_NIS) }}"
                           required>
                </div>

                {{-- PDF ACTUAL --}}
                @if($ficha->FichascaracterizacionEPS)
                    <div class="mb-3">
                        <label>PDF Actual:</label><br>
                        <a href="{{ asset('storage/pdfs/' . $ficha->FichascaracterizacionEPS) }}"
                           target="_blank"
                           class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> Ver PDF Actual
                        </a>
                    </div>
                @endif

                {{-- NUEVO PDF --}}
                <div class="form-group">
                    <label>Nuevo PDF (opcional)</label>
                    <input type="file"
                           name="FichascaracterizacionEPS"
                           class="form-control"
                           accept="application/pdf">
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar
                    </button>

                    <a href="{{ route('fichascaracterizacion.index') }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop
