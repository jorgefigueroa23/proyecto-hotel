@extends('adminlte::page')

@section('title', 'INICIO')

@section('content_header')

<style>
    .error {
    color: red;
    font-size: 0.875em;
}
</style>

@stop

@section('content')

    
    <Livewire:traslados/>

   
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

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

@stop
@section('js')

<script>
    window.addEventListener('file-reset', event => {
        document.getElementById('actaDefuncion').value = null;
    });

</script>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('disponible', function (data) {
                // Llamada a la función del otro componente Livewire
                Livewire.emit('Tumbas:infoTumba0', data);
            });
        });

        Livewire.on('errormsg', function(message) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Error al registrar campos incompletos',
            })
        });

        Livewire.on('alert', function(message) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro guardado con éxito',
            })

            $('#Tumba3').modal('hide');
        });

        Livewire.on('traslado', function(message) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Traslado con éxito',
            })
            
            $('#Tumba3').modal('hide');

        });

    </script>

<script>
    function toggleDisplay() {
        var element = document.getElementById("hiddenDiv");
        var element2 = document.getElementById("framePBI");
        var btnVista = document.getElementById("btnVista");
        if (element.style.display === "none") {
            element.style.display = "block";
            element2.style.display = "none";
            btnVista.innerText = "VOLVER A POWER BI";
        } else {
            element.style.display = "none";
            element2.style.display = "block";
            btnVista.innerText = "VISTA DE NICHO";
        }
    }
</script>
@stop