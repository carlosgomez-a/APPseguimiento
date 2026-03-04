@extends('adminlte::page')

@section('title', 'Crear Ficha')

@section('content')
    <div class="card">
        <div class="card-header"><h3>Crear Nueva Ficha de Caracterización</h3></div>
        <div class="card-body">
            <form action="{{ route('fichascaracterizacion.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Código de Ficha</label>
                        <input type="text" name="Codigo" class="form-control" value="{{ old('Codigo') }}" required>
                    </div>
                    <div class="col-md-8 form-group">
                        <label>Denominación (Numero De La Ficha)</label>
                        <input type="text" name="Denominacion" class="form-control" value="{{ old('Denominacion') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Centro de Formación</label>
                        <select name="tblcentroformacion_NIS" class="form-control" required>
                            <option value="">Seleccione Centro...</option>
                            @foreach($centros as $centro)
                                <option value="{{ $centro->NIS }}">{{ $centro->Denominacion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Programa de Formación</label>
                        <select name="tblprogramasdeformacion_NIS" class="form-control" required>
                            <option value="">Seleccione Programa...</option>
                            @foreach($programas as $prog)
                                <option value="{{ $prog->NIS }}">{{ $prog->Denominacion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Cupo</label>
                        <input type="number" name="Cupo" class="form-control" value="{{ old('Cupo') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Fecha Inicio</label>
                        <input type="date" name="FechaInicio" class="form-control" value="{{ old('FechaInicio') }}" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Fecha Fin</label>
                        <input type="date" name="FechaFin" class="form-control" value="{{ old('FechaFin') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <textarea name="Observaciones" class="form-control" rows="3">{{ old('Observaciones') }}</textarea>
                </div>

                <div class="form-group">
                    <label>PDF de la Ficha</label>
                    <input type="file" name="FichascaracterizacionPDF" class="form-control" accept="application/pdf" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Ficha</button>
                <a href="{{ route('fichascaracterizacion.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
