let btnNewCliente = document.getElementById('btn-new-cliente')
let inptFile = document.getElementById('formFile')
let nombre = document.getElementById('nombre')
let descripcion = document.getElementById('descripcion')
let tipo = document.getElementById('tipo')


btnNewCliente.addEventListener('click', function() {

    
    let modal = new bootstrap.Modal(document.getElementById('modalNewCliente'));
    modal.show();

});

function limpiarInputs(){
    nombre.value = ''
    descripcion.value = ''
    tipo.selectedIndex = 0
}

inptFile.addEventListener('change', function(event) {
    const input = event.target;
    const preview = document.getElementById('previewImg');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
});


$(document).ready(function () {
    $.fn.DataTable.ext.classes.sFilterInput = "form-control form-control-sm search-input";
    $('#datatablesClientes').DataTable({
        "responsive": true, 
        "order": [[3, 'asc']],
        lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'Todos']
        ],
        language: {
            processing: 'Procesando...',
            lengthMenu: 'Mostrando _MENU_ registros por página',
            zeroRecords: 'No hay registros',
            info: 'Mostrando _START_ a _END_ de _MAX_',
            infoEmpty: 'No hay registros disponibles',
            infoFiltered: '(filtrando de _MAX_ total registros)',
            search: 'Buscar',
            paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Último"
                },
                aria: {
                    sortAscending:  ": activar para ordenar ascendentemente",
                    sortDescending: ": activar para ordenar descendentemente"
                }
        },
        //"lengthChange": false, 
        "autoWidth": false,
        "dom": "<'row'<'col-sm-12 col-md-8'l><'col-md-12 col-md-2'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>"
    });
});


const alertaMensaje = (msg, time, icon) => {
    const toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: time,
        //timerProgressBar: true,
        //height: '200rem',
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        },
        customClass: {
            // container: '...',
            popup: 'popup-class',
        }
    });
    toast.fire({
        position: "top-end",
        icon: icon,
        title: msg,
    });
}