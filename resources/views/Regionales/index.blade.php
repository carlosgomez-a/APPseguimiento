@extends('adminlte::page')

@section('title', 'Regionales')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Lista de Regionales</h3>

            <a href="{{ route('regionales.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Regional
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>NIS</th>
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Observaciones</th>
                    <th class="text-center">PDF</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($regionales as $regional)
                    <tr>
                        <td>{{ $regional->NIS }}</td>
                        <td>{{ $regional->Codigo }}</td>
                        <td>{{ $regional->Denominacion }}</td>
                        <td>{{ $regional->Observaciones }}</td>

                        <td class="text-center">
                            @if($regional->RegionalesPDF)
                                <a href="{{ asset('storage/pdfs/' . $regional->RegionalesPDF) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-danger">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @else
                                <span class="badge badge-secondary">Sin PDF</span>
                            @endif
                        </td>

                        <td class="text-center">

                            <a href="{{ route('regionales.show', $regional->NIS) }}"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('regionales.edit', $regional->NIS) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('regionales.destroy', $regional->NIS) }}"
                                  method="POST"
                                  style="display:inline-block;">
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
