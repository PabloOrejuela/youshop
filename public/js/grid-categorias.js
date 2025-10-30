let btnRegistrarCategoria = document.getElementById('btn-registrar-categoria')
let nombre = document.getElementById('nombre')
let descripcion = document.getElementById('descripcion')
let tipo = document.getElementById('tipo')


btnRegistrarCategoria.addEventListener('click', function() {
    
    fetch('registrar-nueva-categoria?nombre='+nombre.value+'&descripcion='+descripcion.value+'&tipo='+tipo.value, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la respuesta del servidor');
        }
        return response.json()
        
    })
    .then(data => {
        //Hago uso de los valores devueltos por la petición
        let tabla = document.getElementById('tbody-categorias')
        tabla.innerHTML = ''

        if (data.res) {
            data.res.forEach(element => {
                tabla.innerHTML += '<tr><td>'+element.id+'</td><td>'+element.nombre+'</td><td>'+element.descripcion+'</td><td>'+element.tipo+'</td><td>'+element.estado+'</td></tr>'
            });
        }
        limpiarInputs()
        alertaMensaje('La categoría fue registrada', 2000, 'success');
        // setInterval(() => {
        //     window.location.reload();
        // }, 2000)
    })
    .catch(error => {
        alertaMensaje('No se pudo registrar la catgoría CORREGIR', 1000, 'error');
        console.error(error);
    });

});

function limpiarInputs(){
    nombre.value = ''
    descripcion.value = ''
    tipo.selectedIndex = 0
}


$(document).ready(function () {
    $.fn.DataTable.ext.classes.sFilterInput = "form-control form-control-sm search-input";
    $('#datatablesCategorias').DataTable({
        "responsive": true, 
        "order": [[1, 'asc']],
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