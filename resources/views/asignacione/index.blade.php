@extends('layouts.app')

@section('template_title')
    Asignacione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Asignaciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('asignaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('+ Agregar asignación') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        
										<th>Descripción</th>
										<th>Empleado</th>
										<th>Departamento</th>
										<th>Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignaciones as $asignacione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $asignacione->descripcion }}</td>
											<td>{{ $asignacione->empleado->nombre }}</td>
											<td>{{ $asignacione->departamento->nombre }}</td>
											<td>{{ $asignacione->fecha }}</td>

                                            <td>
                                                <form action="{{ route('asignaciones.destroy',$asignacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('asignaciones.show',$asignacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('asignaciones.edit',$asignacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $asignaciones->links() !!}
            </div>
        </div>
    </div>
@endsection
