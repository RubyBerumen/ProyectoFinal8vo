@extends('adminlte::page')

@section('template_title')
    {{ $empleado->name ?? "{{ __('Show') Empleado" }}
@endsection

@section('content')
<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $empleado->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Fechanac:</strong>
                            {{ $empleado->fechaNac }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $empleado->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $empleado->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento Id:</strong>
                            {{ $empleado->departamento_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
