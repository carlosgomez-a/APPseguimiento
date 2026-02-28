@extends('adminlte::page')

@section('title', 'Crear Regional')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear Regional</h3>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('regionales.store') }}"
                  enctype="multipart/form-data">
                @csrf

                {{-- Código --}}
                <div class="form-group">
                    <label>Código</label>
                    <input type="number"
                           name="Codigo"
                           class="form-control"
                           value="{{ old('Codigo') }}"
                           required>
                    @error('Codigo')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Denominación --}}
                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text"
                           name="Denominacion"
                           class="form-control"
                           value="{{ old('Denominacion') }}"
                           required>
                    @error('Denominacion')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Observaciones --}}
                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text"
                           name="Observaciones"
                           class="form-control"
                           value="{{ old('Observaciones') }}"
                           required>
                    @error('Observaciones')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- PDF --}}
                <div class="form-group">
                    <label for="RegionalesPDF">PDF (Opcional)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file"
                                   name="RegionalesPDF"
                                   class="custom-file-input"
                                   id="RegionalesPDF"
                                   accept="application/pdf">
                            <label class="custom-file-label" for="RegionalesPDF">
                                Elegir archivo PDF...
                            </label>
                        </div>
                    </div>
                    @error('RegionalesPDF')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <br>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar
                </button>

                <a href="{{ route('regionales.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>
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
