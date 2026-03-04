@extends('adminlte::page')

@section('title', 'Crear Aprendiz')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Crear Aprendiz</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('aprendices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Documento</label>
                    <input type="text" name="NumeroDoc" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" name="Nombres" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" name="Apellidos" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="Direccion" class="form-control">
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="Telefono" class="form-control">
                </div>

                <div class="form-group">
                    <label>Correo Institucional</label>
                    <input type="email" name="CorreoInstitucional" class="form-control">
                </div>

                <div class="form-group">
                    <label>Correo Personal</label>
                    <input type="email" name="CorreoPersonal" class="form-control">
                </div>

                <div class="form-group">
                    <label>Fecha Nacimiento</label>
                    <input type="date" name="FechaNacimiento" class="form-control">
                </div>

                <div class="form-group">
                    <label>Sexo</label>
                    <select name="Sexo" class="form-control">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>


                <div class="form-group">
                    <label>Tipo Documento</label>
                    <select name="tbltiposdocumentos_NIS" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach($tiposdocumentos as $tipo)
                            <option value="{{ $tipo->NIS }}">
                                {{  $tipo->Denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>EPS</label>
                    <select name="tbleps_NIS" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach($eps as $e)
                            <option value="{{ $e->NIS }}">
                                {{ $e->Denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>Ficha de Caracterización</label>
                    <select name="tblfichascaracterizacion_NIS" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach($fichas as $f)
                            <option value="{{ $f->NIS }}">
                                {{ $f->Codigo }} - {{ $f->Denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>PDF</label>
                    <input type="file" name="AprendicesPDF" class="form-control" accept="application/pdf">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">Cancelar</a>

            </form>
        </div>
    </div>

@stop
