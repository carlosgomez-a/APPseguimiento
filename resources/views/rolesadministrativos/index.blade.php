@extends('adminlte::page')

@section('title', 'Roles Administrativos')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Lista de Roles Administrativos</h3>

            <a href="{{ route('rolesadministrativos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Rol
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
                    <th>NIS</th>
                    <th>Descripción</th>
                    <th class="text-center">PDF</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($rolesadministrativos as $rol)
                    <tr>
                        <td>{{ $rol->NIS }}</td>

                        <td>{{ $rol->Descripcion }}</td>

                        {{-- COLUMNA PDF --}}
                        <td class="text-center">
                            @if($rol->RolesadministrativosPDF)
                                <a href="{{ asset('storage/pdfs/' . $rol->RolesadministrativosPDF) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-danger">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            @else
                                <span class="badge badge-secondary">Sin PDF</span>
                            @endif
                        </td>

                        {{-- ACCIONES --}}
                        <td class="text-center">

                            {{-- VER --}}
                            <a href="{{ route('rolesadministrativos.show', $rol->NIS) }}"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- EDITAR --}}
                            <a href="{{ route('rolesadministrativos.edit', $rol->NIS) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- ELIMINAR --}}
                            <form action="{{ route('rolesadministrativos.destroy', $rol->NIS) }}"
                                  method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro que deseas eliminar este registro?')">
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
