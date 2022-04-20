ListarProductos();
function ListarProductos(busqueda) {
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
            ListarProductos();
        }else{
            Swal.fire({
                icon: 'success',
                title: 'Modificado',
                showConfirmButton: false,
                timer: 1500
            })
            registrar.value = "Registrar";
            idp.value = "";
            ListarProductos();
            frm.reset();
        }
    })

}

registrar.addEventListener("click", () => {

    rut.style.cssText = 'pointer-events: false';

    if(rut.value === null || rut.value === ''){
        rut.style.backgroundColor = "yellow";
        rut.placeholder="Campo obligatorio";
    }else if(rut.value !== null || rut.value !== ''){
        rut.style.backgroundColor = "";
        rut.placeholder="";
    }
    if(nombre.value === null || nombre.value === ''){
        nombre.style.backgroundColor = "yellow";
        nombre.placeholder="Campo obligatorio";
    }else if(nombre.value !== null || nombre.value !== ''){
        nombre.style.backgroundColor = "";
        nombre.placeholder="";
    }
    if(apellidos.value === null || apellidos.value === ''){
        apellidos.style.backgroundColor = "yellow";
        apellidos.placeholder="Campo obligatorio";
    }else if(apellidos.value !== null || apellidos.value !== ''){
        apellidos.style.backgroundColor = "";
        apellidos.placeholder="";
    }
    if(empresa.value === null || empresa.value === ''){
        empresa.style.backgroundColor = "yellow";
        empresa.placeholder="Campo obligatorio";
    }else if(empresa.value !== null || empresa.value !== ''){
        empresa.style.backgroundColor = "";
        empresa.placeholder="";
    }

    if(rut.value !== null && rut.value !== '' && nombre.value !== null && nombre.value !== '' && apellidos.value !== null && apellidos.value !== '' && empresa.value !== null && empresa.value !== ''){
        rut.placeholder="Rut";
        nombre.placeholder="Nombre";
        apellidos.placeholder="Apellidos";
        empresa.placeholder="Empresa";

        var datos = new FormData(frm);
        var respuesta = document.getElementById("respuesta");
            
        fetch('duplicado.php', {
            method: 'POST',
            body: datos
        })
    
        .then( res => res.json())
        .then( data => {
            console.log(data);
            if(data === 'duplicado' && registrar.value=='Registrar'){
                respuesta.innerHTML = `<div>El rut ingresado ya existe</div>`
                rut.style.backgroundColor = "red";
            }else if(data === 'duplicado' && registrar.value=='Actualizar'){
                respuesta.innerHTML = `<div></div>`
                registrado(); 
            }else if(data === 'dato ok'){
                respuesta.innerHTML = `<div></div>`
                registrado(); 
            }
        })

        

    }
    
    
});

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
                   ListarProductos();
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
function Editar(id) {
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
        ListarProductos();
    }else{
        ListarProductos(valor);
    }
});
