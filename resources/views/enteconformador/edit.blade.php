@extends('adminlte::page')

@section('title', 'Editar Ente Conformador')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Editar Ente Conformador</h3>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('enteconformador.update', $ente->NIS) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Tipo Documento</label>
                    <input type="text" name="TipoDoc"
                           class="form-control"
                           value="{{ old('TipoDoc', $ente->TipoDoc) }}">
                </div>

                <div class="form-group">
                    <label>Número Documento</label>
                    <input type="text" name="NumeroDoc"
                           class="form-control"
                           value="{{ old('NumeroDoc', $ente->NumeroDoc) }}">
                </div>

                <div class="form-group">
                    <label>Razón Social</label>
                    <input type="text" name="RazonSocial"
                           class="form-control"
                           value="{{ old('RazonSocial', $ente->RazonSocial) }}">
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="Direccion"
                           class="form-control"
                           value="{{ old('Direccion', $ente->Direccion) }}">
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="Telefono"
                           class="form-control"
                           value="{{ old('Telefono', $ente->Telefono) }}">
                </div>

                <div class="form-group">
                    <label>Correo Institucional</label>
                    <input type="email" name="CorreoInstitucional"
                           class="form-control"
                           value="{{ old('CorreoInstitucional', $ente->CorreoInstitucional) }}">
                </div>

                <div class="form-group">
                    <label>Nuevo PDF (opcional)</label>
                    <input type="file"
                           name="EnteconformadorPDF"
                           class="form-control"
                           accept="application/pdf">
                </div>

                @if($ente->EnteconformadorPDF)
                    <div class="mb-3">
                        <a href="{{ asset('storage/pdfs/'.$ente->EnteconformadorPDF) }}"
                           target="_blank"
                           class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> Ver PDF Actual
                        </a>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>

                <a href="{{ route('enteconformador.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@stop
