@extends('adminlte::page')

@section('title', 'Fichas de Caracterización')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Gestión de Fichas de Caracterización</h3>
            <a href="{{ route('fichascaracterizacion.create') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-plus"></i> Nueva Ficha
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th>NIS</th>
                        <th>Código</th>
                        <th>Denominación</th>
                        <th>Cupo</th>
                        <th>F. Inicio</th>
                        <th>F. Fin</th>
                        <th>Centro de Formación</th>
                        <th>Programa</th>
                        <th>Observaciones</th>
                        <th class="text-center">PDF</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fichascaracterizacion as $ficha)
                        <tr>
                            <td><span class="badge badge-secondary">{{ $ficha->NIS }}</span></td>
                            <td><strong>{{ $ficha->Codigo }}</strong></td>
                            <td>{{ $ficha->Denominacion }}</td>
                            <td>{{ $ficha->Cupo }}</td>
                            <td>{{ $ficha->FechaInicio }}</td>
                            <td>{{ $ficha->FechaFin }}</td>
                            <td>{{ $ficha->centroformacion->Denominacion ?? 'N/A' }}</td>
                            <td>{{ $ficha->programaformacion->Denominacion ?? 'N/A' }}</td>
                            <td>
                                <small class="text-muted">
                                    {{ Str::limit($ficha->Observaciones, 30, '...') ?? 'Sin obs.' }}
                                </small>
                            </td>
                            <td class="text-center">
                                @if($ficha->FichascaracterizacionPDF)
                                    <a href="{{ asset('storage/pdfs_fichas/' . $ficha->FichascaracterizacionPDF) }}"
                                       target="_blank" class="btn btn-danger btn-xs" title="Ver PDF">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                @else
                                    <span class="text-muted"><i class="fas fa-times"></i></span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('fichascaracterizacion.show', $ficha->NIS) }}"
                                       class="btn btn-info btn-xs"><i class="fas fa-eye"></i></a>

                                    <a href="{{ route('fichascaracterizacion.edit', $ficha->NIS) }}"
                                       class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>

                                    <form action="{{ route('fichascaracterizacion.destroy', $ficha->NIS) }}"
                                          method="POST" style="display:inline-block;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-xs"
                                                onclick="return confirm('¿Está seguro de eliminar esta ficha?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .table td { vertical-align: middle !important; font-size: 0.9rem; }
        .table th { font-size: 0.85rem; text-transform: uppercase; }
    </style>
@stop
