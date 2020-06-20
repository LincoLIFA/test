@extends('index')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mascota</h1>
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

                        <h3 class="profile-username text-center">{{$pet->name ?? 'Nueva mascota' }}</h3>


                        <a href="#" id="btn-actualizar" class="btn btn-primary btn-block"><b>Guardar</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <b>Datos de Mascota</b>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" id="profile-form">
                            <div class="form-group row">
                                @csrf
                                <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{$pets->name ?? ''}}" placeholder="ingrese nombre">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Dueño</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2bs4" name="owner" data-placeholder="Seleccione un dueño" style="width: 100%;">
                                        <option selected="selected">Seleccione un dueño</option>
                                        @foreach($users as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Tipo de mascota</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2bs4" name="type" data-placeholder="Seleccione un tipo" style="width: 100%;">
                                        <option selected="selected">Seleccione un tipo</option>
                                        @foreach($type as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Edad</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="edad" value="{{$user->email ?? ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Genero</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2bs4" name="sexo" data-placeholder="" style="width: 100%;">
                                        <option selected="selected">Seleccione el genero</option>
                                        <option value="0">Hembra</option>
                                        <option value="0">Macho</option>
                                    </select>
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
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#btn-actualizar').click(function() {
            var data = $('#profile-form').serialize();
            var url = "{{route ('newPets')}}";
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