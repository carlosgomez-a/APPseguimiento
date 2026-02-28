@extends('adminlte::page')

@section('title', 'Alternativas')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Alternativas de etapa productiva</h3>

            <a href="{{ route('alternativasep.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Alternativa
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th class="text-center">Documento</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($alternativasep as $alternativa)
                    <tr>
                        <td>{{ $alternativa->Nombre }}</td>

                        <td>{{ $alternativa->Descripcion }}</td>

                        <td class="text-center">
                            @if(!empty($alternativa->AlternativasepPDF))
                                <a href="{{ asset('storage/pdfs/' . $alternativa->AlternativasepPDF) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-danger">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @else
                                <span class="badge badge-secondary">Sin archivo</span>
                            @endif
                        </td>

                        <td class="text-center">

                            <a href="{{ route('alternativasep.show', $alternativa->NIS) }}"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('alternativasep.edit', $alternativa->NIS) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('alternativasep.destroy', $alternativa->NIS) }}"
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
                </tbody>
            </table>

        </div>
    </div>
@stop
