@extends('adminlte::page')

@section('title', 'subalternativasep')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Subalternativas De Etapa Productiva</h3>
            <a href="{{ route('subalternativasep.create') }}" class="btn btn-primary">
                Nuevo Rol
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Description</th>

                </tr>
                </thead>
                <tbody>
                @foreach($subalternativasep as $sub)
                    <tr>
                        <td>{{ $sub->Nombre }}</td>
                        <td>{{ $sub->Descripcion }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
