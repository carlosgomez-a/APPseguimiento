@extends('adminlte::page')

@section('title', 'Entes Conformadores')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Entes Conformadores</h3>

            <a href="{{ route('enteconformador.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Ente
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
                    <th>Tipo Doc</th>
                    <th>Número</th>
                    <th>Razón Social</th>
                    <th>Teléfono</th>
                    <th class="text-center">PDF</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($entes as $ente)
                    <tr>
                        <td>{{ $ente->TipoDoc }}</td>
                        <td>{{ $ente->NumeroDoc }}</td>
                        <td>{{ $ente->RazonSocial }}</td>
                        <td>{{ $ente->Telefono }}</td>

                        <td class="text-center">
                            @if($ente->EnteconformadorPDF)
                                <a href="{{ asset('storage/pdfs/'.$ente->EnteconformadorPDF) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-danger">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @else
                                <span class="badge badge-secondary">Sin archivo</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('enteconformador.show', $ente->NIS) }}"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('enteconformador.edit', $ente->NIS) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('enteconformador.destroy', $ente->NIS) }}"
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
