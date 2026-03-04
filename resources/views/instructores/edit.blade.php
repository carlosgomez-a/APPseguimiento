@extends('adminlte::page')

@section('title', 'Editar Instructor')

@section('content')
    <div class="card">
        <div class="card-header"><h3>Editar Instructor</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ route('instructores.update', $instructor->NIS) }}" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Tipo Doc (Sigla)</label>
                        <input type="text" name="TipoDoc" class="form-control" value="{{ $instructor->TipoDoc }}">
                    </div>
                    <div class="col-md-8 form-group">
                        <label>Número Documento</label>
                        <input type="text" name="NumeroDoc" class="form-control" value="{{ $instructor->NumeroDoc }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group"><label>Nombres</label><input type="text" name="Nombres" class="form-control" value="{{ $instructor->Nombres }}"></div>
                    <div class="col-md-6 form-group"><label>Apellidos</label><input type="text" name="Apellidos" class="form-control" value="{{ $instructor->Apellidos }}"></div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Tipo Documento</label>
                        <select name="tbltiposdocumentos_NIS" class="form-control">
                            @foreach($tiposdocumentos as $tipo)
                                <option value="{{ $tipo->NIS }}" {{ $instructor->tbltiposdocumentos_NIS == $tipo->NIS ? 'selected' : '' }}>{{ $tipo->Denominacion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>EPS</label>
                        <select name="tbleps_NIS" class="form-control">
                            @foreach($eps as $e)
                                <option value="{{ $e->NIS }}" {{ $instructor->tbleps_NIS == $e->NIS ? 'selected' : '' }}>{{ $e->Denominacion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Rol Administrativo</label>
                        <select name="tblrolesadministrativos_NIS" class="form-control">
                            @foreach($roles as $r)
                                <option value="{{ $r->NIS }}" {{ $instructor->tblrolesadministrativos_NIS == $r->NIS ? 'selected' : '' }}>{{ $r->Denominacion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nuevo PDF (opcional)</label>
                    <input type="file" name="InstructoresPDF" class="form-control" accept="application/pdf">
                    @if($instructor->InstructoresPDF)
                        <small>Actual: <a href="{{ asset('storage/pdfs/'.$instructor->InstructoresPDF) }}" target="_blank">Ver PDF</a></small>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('instructores.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
