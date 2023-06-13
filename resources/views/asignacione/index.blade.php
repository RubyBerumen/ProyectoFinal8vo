@extends('adminlte::page')

@section('template_title')
    Asignacione
@endsection

@section('content')
<br>
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
                                <a href="{{ route('asignaciones.create') }}" class="btn btn-primary btn-md float-right"  data-placement="left">
                                <i class="fa fa-fw fa-plus"></i> {{ __('Crear nueva asignación') }}
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
                            <table class="table table-responsive-sm table-hover" id="abc">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
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
											<td>{{ $asignacione->empleado->nombre}}</td>
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


@section('js')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('#abc').DataTable();
  });
</script>
@stop