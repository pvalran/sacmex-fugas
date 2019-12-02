$("body").on("click","#btn-info_close",closeInfo);
var dataOrden = $('#dataOrden').DataTable({
    "columns": [
    { "data": "ticket" },
    { "data": "fecha_registro" },
    { "data": "direccion" },
    { "data": "estado" },
]});

$("#lstReporte").on("click","input[type='checkbox']",onCheckboxReporte);

$("#btn-asignar_cuadrilla").on("click",onAsignarCuadrilla);

$("#btn-crear_orden").on("click",onCrearOrden);



