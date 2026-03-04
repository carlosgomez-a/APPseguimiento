@extends('adminlte::page')

@section('title', 'Aprendices')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">Lista de Aprendices</h3>

            <a href="{{ route('aprendices.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Aprendiz
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
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Personal</th>
                    <th>Correo Institucional</th>
                    <th>Sexo</th>
                    <th>Fecha De Nacimiento</th>
                    <th>Tipo Documento</th>
                    <th>EPS</th>
                    <th>Ficha</th>
                    <th class="text-center">PDF</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($aprendices as $aprendiz)
                    <tr>
                        <td>{{ $aprendiz->NumeroDoc }}</td>
                        <td>{{ $aprendiz->Nombres }}</td>
                        <td>{{ $aprendiz->Apellidos }}</td>
                        <td>{{ $aprendiz->Direccion }}</td>
                        <td>{{ $aprendiz->Telefono }}</td>
                        <td>{{ $aprendiz->CorreoPersonal }}</td>
                        <td>{{ $aprendiz->CorreoInstitucional }}</td>
                        <td>{{ $aprendiz->Sexo }}</td>
                        <td>{{ $aprendiz->FechaNacimiento }}</td>

                        {{-- FK mostrando nombre correcto --}}
                        <td>{{ $aprendiz->tipoDocumento->Denominacion ?? 'Sin dato' }}</td>
                        <td>{{ $aprendiz->eps->Denominacion ?? 'Sin dato' }}</td>
                        <td>{{ $aprendiz->ficha->Codigo ?? 'Sin dato' }}</td>

                        <td class="text-center">
                            @if(!empty($aprendiz->AprendicesPDF))
                                <a href="{{ asset('storage/pdfs/' . $aprendiz->AprendicesPDF) }}"
                                   target="_blank"
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @else
                                <span class="badge badge-secondary">Sin archivo</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('aprendices.show',$aprendiz->NIS) }}"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('aprendices.edit',$aprendiz->NIS) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('aprendices.destroy',$aprendiz->NIS) }}"
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
