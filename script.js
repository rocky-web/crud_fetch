
ListarPersonas();
function ListarPersonas(busqueda) {
    fetch("listar.php", {
        method: "POST",
        body: busqueda
    }).then(response => response.text()).then(response => {
        resultado.innerHTML = response;
    })
}


function registrado(){
    
    fetch("registrar.php", {
        method: "POST",
        body: new FormData(frm)
    }).then(response => response.text()).then(response => {
        if (response == "ok") {
            Swal.fire({
                icon: 'success',
                title: 'Registrado',
                showConfirmButton: false,
                timer: 1500
            })
            frm.reset();
            ListarPersonas();
        }else{
            Swal.fire({
                icon: 'success',
                title: 'Modificado',
                showConfirmButton: false,
                timer: 1500
            })
            registrar.value = "Registrar";
            idp.value = "";
            ListarPersonas();
            frm.reset();
        }
    })

}


function Eliminar(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'NO'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("eliminar.php", {
                method: "POST",
                body: id
            }).then(response => response.text()).then(response => {
                if (response == "ok") {
                   ListarPersonas();
                   Swal.fire({
                       icon: 'success',
                       title: 'Eliminado',
                       showConfirmButton: false,
                       timer: 1500
                   })
                }
                
            })
            
        }
    })
}
function Editar() {
    fetch("editar.php", {
        method: "POST",
        body: id
    }).then(response => response.json()).then(response => {
        idp.value = response.id;
        autorizado.value = response.autorizado;
        rut.value = response.rut; rut.style.cssText = 'background-color: gray; color: white; pointer-events: none';
        nombre.value = response.nombre;
        apellidos.value = response.apellidos;
        empresa.value = response.empresa;
        seccion.value = response.seccion;
        patente.value = response.patente;
        observaciones.value = response.observaciones;
        registrar.value = "Actualizar"
    })
}
buscar.addEventListener("keyup", () => {
    const valor = buscar.value;
    if (valor == "") {
        ListarPersonas();
    }else{
        ListarPersonas(valor);
    }
});
