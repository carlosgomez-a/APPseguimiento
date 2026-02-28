@extends('adminlte::page')

@section('title', 'EPS')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">Listado EPS</h3>
            <a href="{{ route('eps.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva EPS
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Número Doc</th>
                    <th>Denominación</th>
                    <th>Observaciones</th>
                    <th class="text-center">PDF</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($eps as $e)
                    <tr>
                        <td>{{ $e->NumeroDoc }}</td>
                        <td>{{ $e->Denominacion }}</td>
                        <td>{{ $e->Observaciones }}</td>

                        <td class="text-center">
                            @if($e->EpsPDF)
                                <a href="{{ asset('storage/pdfs/' . $e->EpsPDF) }}" target="_blank"
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('eps.show', $e->NIS) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('eps.edit', $e->NIS) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('eps.destroy', $e->NIS) }}" method="POST"
                                  style="display:inline-block;">
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
