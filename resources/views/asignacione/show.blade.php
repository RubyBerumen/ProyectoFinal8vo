@extends('adminlte::page')

@section('template_title')
    {{ $asignacione->name ?? "{{ __('Show') Asignacione" }}
@endsection

@section('content')
<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Asignacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asignaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $asignacione->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $asignacione->empleado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento Id:</strong>
                            {{ $asignacione->departamento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $asignacione->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
