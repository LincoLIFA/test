@extends('index')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perfil de usuario</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{Storage::url(auth()->user()->avatar ?? 'default.png')}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>E-mail</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Dirección</b> <a class="float-right">{{$user->direccion ?? 'No hay registro'}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Telefono</b> <a class="float-right">{{$user->telefono ?? 'No hay registro'}}</a>
                            </li>
                        </ul>
                        <a href="#" id="btn-actualizar" class="btn btn-primary btn-block"><b>Actualizar</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <b>Datos de Ususario</b>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" id="profile-form">
                            <div class="form-group row">
                                @method('PUT')
                                @csrf
                                <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{$user->name ?? name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="{{$user->email ?? 'email'}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLocate" class="col-sm-2 col-form-label">Dirección</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="direccion" value="{{$user->direccion ?? ''}}" placeholder="{{$user->direccion ?? 'Dirección'}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="imputPhone" class="col-sm-2 col-form-label">Teléfono</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="telefono" data-inputmask="mask:(+99) 9-9999-9999" data-mask="" im-insert="true" value="{{$user->telefono ?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $.validator.setDefaults({
            submitHandler: function() {}
        });
        $('#profile-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                telefono: {
                    required: false,
                    maxlength: 10
                },
            },
            messages: {
                email: {
                    required: "Por favor, ingresa tu email",
                    email: "Por favor, inressa un email valido"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });


    $(function() {
        $('[data-mask]').inputmask();
    });
</script>
<script>
    $(document).ready(function() {
        $('#btn-actualizar').click(function() {
            var data = $('#profile-form').serialize();
            var url = "{{route ('updateUser')}}";
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(data) {
                    alert('Los cambios se han realizado con éxito');
                }
            });
        });
    });
</script>

@endsection