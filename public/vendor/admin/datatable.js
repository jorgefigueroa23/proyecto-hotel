$(function () {   
  $('#tabla_servicios').DataTable({
   "dom": 'Bfrtip',
   "paging": true,
   "lengthChange": true,
   "searching": true,      
   "ordering": true,
   "order": [[0, "asc"]],
   "info": true,
   "autoWidth": false,
   "responsive": true,
   "paging": true,
   "language": {
   "emptyTable": "No hay datos disponibles para mostrar",
   "info": "Mostrando  _START_ a _END_ de _TOTAL_ entradas",
   "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
   "infoFiltered": "(filtrado de _MAX_ entradas totales)",
   "infoPostFix": "",
   "thousands": ",",
   "lengthMenu": "Mostrar _MENU_ entradas",
   "loadingRecords": "Cargando...",
   "processing": "Procesando...",
   "search": "Buscar:",
   "zeroRecords": "No se encontraron registros coincidentes",
   "paginate": {
     "first": "Primero",
     "last": "Último",
     "next": "Siguiente",
     "previous": "Anterior"
   },
   },
   "with-buttons": true,
   "buttons":
    [ 
      { "extend": "excel", "text": '<i class="fas fa-file-excel"></i> Excel', "titleAttr": "Exportar Excel", "className": "btn-success mt-1" }, 
      {
        "text": '<i class="fas fa-plus-square"></i> Registro',
        "titleAttr": "Agregar nuevo servicio",
        "className": "btn-info mt-1 mx-1",
        "action": function () {
            $('#servicioAdd').modal('show');
        }
      }
    ],
  })
});

// Path: public/vendor/admin/livewire.js
$(function () {   
    $('#tabla_enterrados').DataTable({
    "dom": 'Bfrtip',
    "paging": true,
    "lengthChange": true,
    "searching": true,      
    "ordering": true,
    "order": [[0, "asc"]],
    "info": true,
    "autoWidth": true,
    "responsive": true,
    "paging": true,
    "language": {
    "emptyTable": "No hay datos disponibles para mostrar",
    "info": "Mostrando  _START_ a _END_ de _TOTAL_ entradas",
    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
    "infoFiltered": "(filtrado de _MAX_ entradas totales)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ entradas",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "No se encontraron registros coincidentes",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
  },
  "with-buttons": true,
  "buttons":
    [ 
      { "extend": "excel", "text": '<i class="fas fa-file-excel"></i> Excel', "titleAttr": "Exportar Excel", "className": "btn-success mt-1" }
    ],
  })
});

/* TRALASDOS */

$(document).ready(function() {
  $('#tabla_traslados').DataTable({
      "dom": 'Bfrtip',
      "paging": true,
      "lengthChange": true,
      "searching": true,      
      "ordering": true,
      "order": [[0, "asc"]],
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "paging": true,
      "language": {
      "emptyTable": "No hay datos disponibles para mostrar",
      "info": "Mostrando  _START_ a _END_ de _TOTAL_ entradas",
      "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
      "infoFiltered": "(filtrado de _MAX_ entradas totales)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron registros coincidentes",
      "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
      },
  },
  "with-buttons": true,
  "buttons":
    [ 
      { "extend": "excel", "text": '<i class="fas fa-file-excel"></i> Excel', "titleAttr": "Exportar Excel", "className": "btn-success mt-1" }
    ],  
  });
});

/* ESTADOS DE PAGO */

$(document).ready(function() {
  $('#tabla_estadoPago').DataTable({
      "dom": 'Bfrtip',
      "paging": true,
      "lengthChange": true,
      "searching": true,      
      "ordering": true,
      "order": [[0, "asc"]],
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "paging": true,
      "language": {
      "emptyTable": "No hay datos disponibles para mostrar",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
      "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
      "infoFiltered": "(filtrado de _MAX_ entradas totales)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron registros coincidentes",
      "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
      },
  },
  "with-buttons": true,
  "buttons":
  [ 
    {"extend": "excel", "text": '<i class="fas fa-file-excel"></i> Excel', "titleAttr": "Exportar Excel", "className": "btn-success mt-1" }
  ],      
  });
});


$(document).ready(function() {
  $('#tabla_pabellones').DataTable({
      "dom": 'Bfrtip',
      "paging": true,
      "lengthChange": true,
      "searching": true,      
      "ordering": true,
      "order": [[0, "asc"]],
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "paging": true,
      "language": {
      "emptyTable": "No hay datos disponibles para mostrar",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
      "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
      "infoFiltered": "(filtrado de _MAX_ entradas totales)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron registros coincidentes",
      "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
      },
  },
  "with-buttons": true,
  "buttons":
  [ 
    {"extend": "excel", "text": '<i class="fas fa-file-excel"></i> Excel', "titleAttr": "Exportar Excel", "className": "btn-success mt-1" },
    {
      "text": '<i class="fas fa-plus-square"></i> Registro',
      "titleAttr": "Agregar nuevo pabellon",
      "className": "btn-info mt-1 mx-1",
      "action": function () {
          $('#pabellonAdd').modal('show');
      }
    }
  ],      
  });
});

/* USUARIOS */

$(document).ready(function() {
  $('#tabla_usuarios').DataTable({
      "dom": 'Bfrtip',
      "paging": true,
      "lengthChange": true,
      "searching": true,      
      "ordering": true,
      "order": [[0, "asc"]],
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "paging": true,
      "language": {
      "emptyTable": "No hay datos disponibles para mostrar",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
      "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
      "infoFiltered": "(filtrado de _MAX_ entradas totales)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron registros coincidentes",
      "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
      },
  },
  "with-buttons": true,
  "buttons":
  [ 
    {"extend": "excel", "text": '<i class="fas fa-file-excel"></i> Excel', "titleAttr": "Exportar Excel", "className": "btn-success mt-1" },
    {
      "text": '<i class="fas fa-plus-square"></i> Registro',
      "titleAttr": "Agregar nuevo pabellon",
      "className": "btn-info mt-1 mx-1",
      "action": function () {
          $('#addUser').modal('show');
      }
    }
  ],      
  });
});

