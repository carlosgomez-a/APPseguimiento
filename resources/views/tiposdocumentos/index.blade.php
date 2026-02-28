@extends('adminlte::page')

@section('title', 'Tipos de Documentos')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Lista de Tipos de Documentos</h3>
            <a href="{{ route('tiposdocumentos.create') }}" class="btn btn-primary">
                Nuevo Tipo
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>NIS</th>
                    <th>Denominación</th>
                    <th>Observaciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tiposdocumentos as $tipo)
                    <tr>
                        <td>{{ $tipo->NIS }}</td>
                        <td>{{ $tipo->Denominacion }}</td>
                        <td>{{ $tipo->Observaciones }}</td>@extends('adminlte::page')

                        @section('title', 'Tipos de Documentos')

                        @section('content')
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h3>Lista de Tipos de Documentos</h3>
                                    <a href="{{ route('tiposdocumentos.create') }}" class="btn btn-primary">
                                        Nuevo Tipo
                                    </a>
                                </div>

                                <div class="card-body">

                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Denominación</th>
                                            <th>Observaciones</th>
                                            <th>PDF</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($tiposdocumentos as $tipo)
                                            <tr>
                                                <td>{{ $tipo->NIS }}</td>
                                                <td>{{ $tipo->Denominacion }}</td>
                                                <td>{{ $tipo->Observaciones }}</td>

                                                <td>
                                                    @if($tipo->TiposdocumentosPDF)
                                                        <a href="{{ asset('storage/pdfs/' . $tipo->TiposdocumentosPDF) }}"
                                                           target="_blank"
                                                           class="btn btn-danger btn-sm">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </a>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ route('tiposdocumentos.show', $tipo->NIS) }}"
                                                       class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('tiposdocumentos.edit', $tipo->NIS) }}"
                                                       class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('tiposdocumentos.destroy', $tipo->NIS) }}"
                                                          method="POST"
                                                          style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('¿Seguro que deseas eliminar?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @stop
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
