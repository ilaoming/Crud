var tabla;

function init(){
    $("#formProducto").on("submit",function(e){
        guardarEditar(e);	
    });
}

$(document).ready(function(){ 
    tabla=$('#productoData').dataTable({
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom:'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [     
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
        "ajax":{
            url: '../../controller/producto.php?op=listar',
            type : "get",
            dataType : "json",
            error: function(e){
                console.log(e.responseText);	
            }
        },
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 10 registros hace una paginación
	    "order": [[ 0, "asc" ]],//Ordenar (columna,orden)
	    "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
		}
	}).DataTable();
});

function refreshTable() {
    $('#productoData').DataTable().clear();
    $('#productoData').DataTable().ajax.reload();
}

function eliminar(prod_id){
  swal.fire({
    title: 'Eliminar',
    text: "Desea Eliminar el Registro?",
    icon: 'error',
    showCancelButton: true,
    confirmButtonText: 'Si, Borrar!',
    cancelButtonText: 'No, Cancelar!',
    reverseButtons: true
}).then((result) => {
    if (result.isConfirmed) {

        $.post("../../controller/producto.php?op=eliminar",{prod_id:prod_id},function (data) {
            refreshTable();
        });

        swal.fire(
            'Eliminado!',
            'El registro se elimino correctamente.',
            'success'
        )
    }
})
}

 function editar(prod_id) { 
    $('#modalTitulo').html('Editar');
    $.post("../../controller/producto.php?op=mostrar",{prod_id:prod_id},function (data) {
        data = JSON.parse(data);
        $('#prod_id').val(data.prod_id);
        $('#prod_nom').val(data.prod_nom);
        $('#prod_desc').val(data.prod_desc);
    });
    $('#modalMantenimiento').modal('show');
  }

  function guardarEditar(e){
    e.preventDefault();
    var formData = new FormData($("#formProducto")[0]);
    $.ajax({
        url: "../../controller/producto.php?op=guardarEditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){

            $('#formProducto')[0].reset();
            $("#modalMantenimiento").modal('hide');
            refreshTable();

            swal.fire(
                'Registro!',
                'El registro correctamente.',
                'success'
            )
        }
    });
}

  $(document).on("click","#btnNuevoRegistro", function(){
    $('#modalTitulo').html('Nuevo Registro');
    $('#formProducto')[0].reset();
    $('#prod_id').val('');
    $('#modalMantenimiento').modal('show');
});


init();