@extends('adminlte::page')

@section('title', 'Editar Ficha')

@section('content')
    <div class="card">
        <div class="card-header"><h3>Editar Ficha</h3></div>
        <div class="card-body">
            <form action="{{ route('fichascaracterizacion.update', $ficha->NIS) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Código</label>
                        <input type="text" name="Codigo" class="form-control" value="{{ $ficha->Codigo }}" required>
                    </div>
                    <div class="col-md-8 form-group">
                        <label>Denominación</label>
                        <input type="text" name="Denominacion" class="form-control" value="{{ $ficha->Denominacion }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Centro de Formación</label>
                        <select name="tblcentroformacion_NIS" class="form-control" required>
                            @foreach($centros as $centro)
                                <option value="{{ $centro->NIS }}" {{ $ficha->tblcentroformacion_NIS == $centro->NIS ? 'selected' : '' }}>
                                    {{ $centro->Denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Programa</label>
                        <select name="tblprogramasdeformacion_NIS" class="form-control" required>
                            @foreach($programas as $prog)
                                <option value="{{ $prog->NIS }}" {{ $ficha->tblprogramasdeformacion_NIS == $prog->NIS ? 'selected' : '' }}>
                                    {{ $prog->Denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Archivo PDF actual: </label>
                    <span class="text-muted">{{ $ficha->FichascaracterizacionPDF }}</span>
                    <input type="file" name="FichascaracterizacionPDF" class="form-control" accept="application/pdf">
                    <small>Deje vacío para mantener el archivo actual.</small>
                </div>

                <button type="submit" class="btn btn-warning">Actualizar Ficha</button>
                <a href="{{ route('fichascaracterizacion.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
