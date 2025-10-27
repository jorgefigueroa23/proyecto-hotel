@extends('adminlte::page')

@section('title', 'LISTA HABITACIONES')

@section('content_header')
@stop

@section('content')
    <livewire:habitacion.create-habitacion/>
    
    <livewire:habitacion.show-habitaciones/>
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

    Livewire.on('editarHabitacion', function(message) {
        $('#habitacionEdit').modal('show');
    });

    Livewire.on('refresh', function(message) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se creó con éxito',
            });
        $('#pabellonAdd').modal('hide');
    });

    Livewire.on('actualizarHabitacion', function(message) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se modificó con éxito',
            });
        $('#habitacionEdit').modal('hide');
    });

    Livewire.on('eliminarPabellon', function(message) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se deshabilito con éxito',
            });
    });

    Livewire.on('habilitarPabellon', function(message) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se Habilito con éxito',
            });
    });
</script>

@stop