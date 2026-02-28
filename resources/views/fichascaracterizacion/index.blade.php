@extends('adminlte::page')

@section('title', 'Fichas')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">Listado Fichas</h3>
            <a href="{{ route('fichascaracterizacion.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Ficha
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Cupo</th>
                    <th>Fechas</th>
                    <th class="text-center">PDF</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($fichas as $ficha)
                    <tr>
                        <td>{{ $ficha->Codigo }}</td>
                        <td>{{ $ficha->Denominacion }}</td>
                        <td>{{ $ficha->Cupo }}</td>
                        <td>{{ $ficha->FechaInicio }} - {{ $ficha->FechaFin }}</td>

                        <td class="text-center">
                            @if($ficha->FichascaracterizacionEPS)
                                <a href="{{ asset('storage/pdfs/' . $ficha->FichascaracterizacionEPS) }}"
                                   target="_blank" class="btn btn-danger btn-sm">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('fichascaracterizacion.show', $ficha->NIS) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('fichascaracterizacion.edit', $ficha->NIS) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('fichascaracterizacion.destroy', $ficha->NIS) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
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
