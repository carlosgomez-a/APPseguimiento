@extends('adminlte::page')

@section('title', 'Crear Alternativa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Alternativa</h3>
        </div>

        <div class="card-body">
            {{-- 1. Se añadió enctype="multipart/form-data" para permitir subir archivos --}}
            <form method="POST" action="{{ route('alternativasep.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="Nombre" class="form-control" value="{{ old('Nombre') }}" required>
                    @error('Nombre') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" name="Descripcion" class="form-control" value="{{ old('Descripcion') }}" required>
                    @error('Descripcion') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- 2. Nuevo campo para el PDF siguiendo tu estructura de "Cámara de Comercio" --}}
                <div class="form-group">
                    <label for="AlternativasepPDF">Anexo PDF (Cámara de Comercio)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file"
                                   name="AlternativasepPDF"
                                   class="custom-file-input"
                                   id="AlternativasepPDF"
                                   accept="application/pdf"
                                   required>
                            <label class="custom-file-label" for="AlternativasepPDF">Elegir archivo PDF...</label>
                        </div>
                    </div>
                    @error('AlternativasepPDF') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Registro
                    </button>
                    <a href="{{ route('alternativasep.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    {{-- Script para que aparezca el nombre del archivo seleccionado en el input de AdminLTE --}}
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
@stop
