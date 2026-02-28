@extends('adminlte::page')

@section('title', 'Editar Centro')

@section('content')
    <div class="card">
        <div class="card-header"><h3>Editar Centro: {{ $centro->Denominacion }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ route('centroformacion.update', $centro->NIS) }}" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="form-group"><label>Código</label><input type="text" name="Codigo" class="form-control" value="{{ $centro->Codigo }}"></div>
                <div class="form-group"><label>Denominación</label><input type="text" name="Denominacion" class="form-control" value="{{ $centro->Denominacion }}"></div>
                <div class="form-group"><label>Dirección</label><input type="text" name="Direccion" class="form-control" value="{{ $centro->Direccion }}"></div>
                <div class="form-group"><label>Regional NIS</label><input type="number" name="tblregionales_NIS" class="form-control" value="{{ $centro->tblregionales_NIS }}"></div>

                <div class="form-group">
                    <label>Cambiar PDF (Opcional)</label>
                    <input type="file" name="CentroformacionPDF" class="form-control" accept="application/pdf">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('centroformacion.index') }}" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
@stop
