@extends('adminlte::page')

@section('title', 'Alternativas')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Alternativas de etapa productiva</h3>
            <div class="ml-auto">
                {{-- Botón para ir al formulario de creación --}}
                <a href="{{ route('alternativasep.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nueva Alternativa
                </a>
            </div>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th class="text-center">Documento Anexo</th> {{-- Nueva columna --}}
                </tr>
                </thead>
                <tbody>
                @foreach($alternativasep as $alternativa)
                    <tr>
                        <td>{{ $alternativa->Nombre }}</td>
                        <td>{{ $alternativa->Descripcion }}</td>
                        <td class="text-center">
                            @if($alternativa->AlternativasepPDF)
                                {{-- Enlace que abre el PDF en una pestaña nueva --}}
                                <a href="{{ asset('uploads/alternativas/pdf/' . $alternativa->AlternativasepPDF) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-danger"
                                   title="Ver Cámara de Comercio">
                                    <i class="fas fa-file-pdf"></i> Ver PDF
                                </a>
                            @else
                                <span class="badge badge-secondary">Sin archivo</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop
