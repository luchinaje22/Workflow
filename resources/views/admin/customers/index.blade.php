@extends('adminlte::page')

@section('title', 'Clientes')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
@endsection

@section('content_header')
    <p class="text-xl">Gestion de Clientes</p>
@endsection

@section('content')
    <!-- Main content -->
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Clientes | Lista</h3>
                            <div class="card-tools">
                                <a class="btn btn-success" href="{{route('admin.customers.create')}}"><i
                                    class="fas fa-plus-square"></i></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table-customer" class="table table-striped table-responsive-lg">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Celular</th>
                                        <th>Venc L.N.C.</th>
                                        <th>Email</th>
                                        <th width="80px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->last_name}}, {{$customer->name}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{\Carbon\Carbon::parse($customer->expire_license)->format('d/m/Y')}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.customers.edit',$customer) }}"><i
                                                class="fas fa-edit"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'class' => 'form-eliminar', 'route' => ['admin.customers.destroy', $customer],'style'=>'display:inline']) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

@endsection


@section('js')
    <script>
        $(function () {

            $('#table-customer').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,

                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por pagina",
                    "zeroRecords": "No hay registro para mostrar",
                    "info": "Mostrando la pagina _PAGE_ de _PAGES_ paginas",
                    "infoEmpty": "",
                    "infoFiltered": "(Filtrando de _MAX_ registros)",
                    'search': "Buscar",
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                }
            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('info') == 'cliente creado')
            <script>
                Swal.fire(
                    'Exito!',
                    'Cliente creado correctamente',
                    'success'
                )
            </script>
        @endif

        @if (session('info') == 'Cliente eliminado')
            <script>
                Swal.fire(
                    'Exito!',
                    'Cliente eliminado correctamente',
                    'success'
                )
            </script>
        @elseif (session('info') == 'cliente actualizado')
            <script>
                Swal.fire(
                    'Exito!',
                    'Cliente actualizado correctamente',
                    'success'
                )
            </script>
        @endif

    <script>
        $('.form-eliminar').submit(function(e) {
            e.preventDefault();
            //luego le paso el alert
            Swal.fire({
                title: 'Estas seguro que deseas eliminar un cliente?',
                text: "No podras revertirlo",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    this
                        .submit(); //luego en mi controlador pongo msj de sesion y luego lo reciboantes del alert
                }
            })
        });
    </script>
@stop
