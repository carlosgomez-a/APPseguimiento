@extends('adminlte::page')

@section('title', 'Centros de Formación')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Listado de Centros de Formación</h3>
            <a href="{{ route('centroformacion.create') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-plus"></i> Nuevo Centro
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Dirección</th>
                    <th class="text-center">PDF</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($centros as $centro)
                    <tr>
                        <td>{{ $centro->Codigo }}</td>
                        <td>{{ $centro->Denominacion }}</td>
                        <td>{{ $centro->Direccion }}</td>
                        <td class="text-center">
                            @if($centro->CentroformacionPDF)
                                <a href="{{ asset('storage/pdfs_centros/' . $centro->CentroformacionPDF) }}" target="_blank" class="btn btn-sm btn-danger">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @else
                                <span class="badge badge-secondary">Sin archivo</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('centroformacion.show', $centro->NIS) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('centroformacion.edit', $centro->NIS) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('centroformacion.destroy', $centro->NIS) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
