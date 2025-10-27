@extends('adminlte::page')

@section('title', 'USUARIOS')

@section('content_header')
<style>

.label {
    padding: 5px;
    border-radius: 3px;
    color: white;
}

.label-admin {
    background-color: #36a5d5;
}

.label-user {
    background-color: #9f9f9f;
}

.label-default {
    background-color: #8abb7a;
}

</style>
@stop

@section('content')
    <livewire:administracion.usuario.create-usuario/>
    <livewire:administracion.usuario.show-usuarios/>

@stop

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '2.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', '©UTP - 2025') }}
        </a>
    </strong>
@stop

@section('css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
@stop

@section('js')
    <script>
        Livewire.on('habilitarUsuario', function(message) {
        Swal.fire({
            position: 'center',
            icon: "success",
            title: 'Usuario, habilitado con éxito',
            })
        });

        Livewire.on('eliminarUsuario', function(message) {
        Swal.fire({
            position: 'center',
            icon: "error",
            title: 'Usuario, Inhabilitado con éxito',
            })
        });

        Livewire.on('resetUser', function(message) {
        Swal.fire({
            position: 'center',
            icon: "info",
            title: 'Contraseña restaurada con éxito',
            })
        });

        Livewire.on('actualizaUsuario', function(message) {
        Swal.fire({
            position: 'center',
            icon: "success",
            title: 'Actualización satisfactoria',
            })
        });

        Livewire.on('editarUsuario', function(message) {
            $('#editUser').modal('show');
            
        });

        Livewire.on('closeEditUser', function(message) {
            $('#editUser').modal('hide');
        });
    </script>

@if(session('user') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Usuario creado correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'update')
    <script>
        Swal.fire(
        'Actualizado!',
        'El usuario se actualizo correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'error')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Oops...',
            text: 'Fallo el proceso',
        })  
    </script>
@endif

@if(session('user') == 'delete')
    <script>
        Swal.fire(
        'Desactivado!',
        'El usuario se desactivo correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'active')
    <script>
        Swal.fire(
        'Activado!',
        'El usuario se activo correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'empty')
    <script>
        Swal.fire({
            icon: 'warning',
            title:'Oops...',
            text: 'Ingrese datos solicitados',
        })
    </script>
@endif

@if(session('user') == 'reset')
    <script>
        Swal.fire(
        'Restablecido!',
        'La contraseña se restablecio correctamente.',
        'success'
        )
    </script>
@endif

<script>
    jQuery('.soloNumeros').keypress(function (tecla) {
    if (tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
</script>
@stop