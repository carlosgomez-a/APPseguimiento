@extends('adminlte::page')

@section('title', 'Crear EPS')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Crear EPS</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('eps.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Número Documento</label>
                    <input type="text" name="NumeroDoc" class="form-control" value="{{ old('NumeroDoc') }}" required>
                </div>

                <div class="form-group">
                    <label>Denominación</label>
                    <input type="text" name="Denominacion" class="form-control" value="{{ old('Denominacion') }}" required>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" name="Observaciones" class="form-control" value="{{ old('Observaciones') }}">
                </div>

                <div class="form-group">
                    <label>PDF EPS</label>
                    <div class="custom-file">
                        <input type="file" name="EpsPDF" class="custom-file-input" accept="application/pdf" required>
                        <label class="custom-file-label">Elegir archivo...</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>

                <a href="{{ route('eps.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });
    </script>
@stop
