@extends('adminlte::page')

@section('title', 'LISTA SERVICIOS')

@section('content_header')

@stop

@section('content')
    <livewire:servicios/>
    <livewire:show-servicios/>
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
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></link> -->
    
@stop

@section('js')
    <script>
        Livewire.on('eliminado', function(message) {
        Swal.fire({
            position: 'center',
            icon: "success",
            title: 'Servicio eliminado con éxito',
            })
        });

        Livewire.on('servicioUpdate', function(message) {
        Swal.fire({
            position: 'center',
            icon: "success",
            title: 'Servicio actualizado con éxito',
            })

        $('#servicioEdit').modal('hide');
        
        });

        Livewire.on('servicioAdd', function(message) {
        Swal.fire({
            position: 'center',
            icon: "success",
            title: 'Servicio agregado con éxito',
            })
            $('#servicioAdd').modal('hide');
        });

        Livewire.on('openEdit', function() {
            $('#servicioEdit').modal('show');
            /* setTimeout(function() {
                location.reload();
            }, 2000); */
            });
    </script>
@stop