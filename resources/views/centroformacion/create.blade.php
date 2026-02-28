@extends('adminlte::page')

@section('title', 'Crear Centro')

@section('content')
    <div class="card">
        <div class="card-header"><h3>Registrar Nuevo Centro de Formación</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ route('centroformacion.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Código del Centro</label>
                            <input type="text" name="Codigo" class="form-control" value="{{ old('Codigo') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Denominación</label>
                            <input type="text" name="Denominacion" class="form-control" value="{{ old('Denominacion') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="Direccion" class="form-control" value="{{ old('Direccion') }}" required>
                </div>

                <div class="form-group">
                    <label>ID Regional (NIS)</label>
                    <input type="number" name="tblregionales_NIS" class="form-control" value="{{ old('tblregionales_NIS') }}" required>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <textarea name="Observaciones" class="form-control">{{ old('Observaciones') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Documento PDF</label>
                    <div class="custom-file">
                        <input type="file" name="CentroformacionPDF" class="custom-file-input" id="pdfFile" accept="application/pdf" required>
                        <label class="custom-file-label" for="pdfFile">Elegir PDF...</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('centroformacion.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
@stop
