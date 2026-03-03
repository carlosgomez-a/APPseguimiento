@extends('adminlte::page')

@section('title', 'Programas de Formación')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Programas de Formación</h3>

            <a href="{{ route('programasdeformacion.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Programa
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Observaciones</th>
                    <th class="text-center">Documento</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($programas as $programa)
                    <tr>
                        <td>{{ $programa->Codigo }}</td>
                        <td>{{ $programa->Denominacion }}</td>
                        <td>{{ $programa->Observaciones }}</td>

                        <td class="text-center">
                            @if($programa->ProgramasdeformacionPDF)
                                <a href="{{ asset('storage/pdfs/'.$programa->ProgramasdeformacionPDF) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-danger">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @else
                                <span class="badge badge-secondary">Sin archivo</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('programasdeformacion.show', $programa->NIS) }}"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('programasdeformacion.edit', $programa->NIS) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('programasdeformacion.destroy', $programa->NIS) }}"
                                  method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
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
