@extends('adminlte::page')

@section('title', 'ESTADOS DE PAGO')

@section('content_header')
@stop

@section('content')
    <livewire:estados-pagos/>
    <livewire:show-estado-pago/>
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
        Livewire.on('enableUser', function(message) {
        Swal.fire({
            position: 'center',
            icon: "success",
            title: 'Usuario, habilitado con éxito',
            })
        });

        Livewire.on('deleteUser', function(message) {
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
    </script>
@stop