@extends('index')

@section('content')
<script>
    $(document).ready(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Registro de Dueños</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Mascotas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                            <tr>
                                <td>
                                    <a href="">{{$item->id}}</a>
                                </td>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->email}}
                                </td>
                                <td>
                                    {{$item->direccion}}
                                </td>
                                <td>
                                    @foreach($pets as $pet)
                                    {{$pet->name}}
                                    @endforeach
                                </td>
                                <td>
                                    <div class="row">
                                        <a href="#" class="btn btn-primary mr-1"> <i class="far fa-edit"></i></a>
                                        <form method="post" action="#">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-primary" type="submit"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>

                                </td>

                            </tr>
                            @endforeach()
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dueño</th>
                                <th>Tipo</th>
                                <th>Edad</th>
                                <th>Action</th>
                            </tr>
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
</section>
<!-- /.content -->

@endsection