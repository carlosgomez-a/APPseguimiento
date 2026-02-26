@extends('adminlte::page')

@section('title', 'Regionales')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Lista de Regionales</h3>
            <a href="{{ route('regionales.create') }}" class="btn btn-primary">
                Nueva Regional
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
                    <th>NIS</th>
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Observaciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($regionales as $regional)
                    <tr>
                        <td>{{ $regional->NIS }}</td>
                        <td>{{ $regional->Codigo }}</td>
                        <td>{{ $regional->Denominacion }}</td>
                        <td>{{ $regional->Observaciones }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
