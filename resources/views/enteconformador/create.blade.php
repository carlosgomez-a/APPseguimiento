@extends('adminlte::page')

@section('title', 'Crear Ente Conformador')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Ente Conformador</h3>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('enteconformador.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Tipo Documento</label>
                    <input type="text" name="TipoDoc"
                           class="form-control"
                           value="{{ old('TipoDoc') }}" required>
                    @error('TipoDoc') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Número Documento</label>
                    <input type="text" name="NumeroDoc"
                           class="form-control"
                           value="{{ old('NumeroDoc') }}" required>
                    @error('NumeroDoc') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Razón Social</label>
                    <input type="text" name="RazonSocial"
                           class="form-control"
                           value="{{ old('RazonSocial') }}" required>
                    @error('RazonSocial') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="Direccion"
                           class="form-control"
                           value="{{ old('Direccion') }}" required>
                    @error('Direccion') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="Telefono"
                           class="form-control"
                           value="{{ old('Telefono') }}" required>
                    @error('Telefono') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Correo Institucional</label>
                    <input type="email" name="CorreoInstitucional"
                           class="form-control"
                           value="{{ old('CorreoInstitucional') }}" required>
                    @error('CorreoInstitucional') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Documento PDF</label>
                    <div class="custom-file">
                        <input type="file"
                               name="EnteconformadorPDF"
                               class="custom-file-input"
                               id="EnteconformadorPDF"
                               accept="application/pdf"
                               required>
                        <label class="custom-file-label" for="EnteconformadorPDF">
                            Elegir archivo PDF...
                        </label>
                    </div>
                    @error('EnteconformadorPDF') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>

                    <a href="{{ route('enteconformador.index') }}"
                       class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label')
                .addClass("selected")
                .html(fileName);
        });
    </script>
@stop
