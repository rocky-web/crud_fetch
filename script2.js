// escribir rut formato correcto
document.getElementById("rut").addEventListener("keyup", formatoRut) //escribir 1 x 1
document.getElementById("rut").addEventListener("keypress", formatoRut) // mantener tecla presionada

function formatoRut(){
    rut.value=rut.value.replace(/[.-]/g, '')
    .replace( /^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4') 
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
            // console.log(data);
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




document.getElementById("registrar").addEventListener("click", function(event){
    var texto = rut.value;
    var criterio1 = texto.search(/(^\d{1,2})(\.)(\d{3})(\.)(\d{3})(\-)(\d|\k)\b/gim)
    var criterio2 = texto.search(/^\d{7}(\k|\d)\b/gim)
    var criterio3 = texto.search(/^\d{8}(\k|\d)\b/gim)
    var criterio4 = texto.search(/(^\d{7,8}\-)(\k|\d)\b/gim)

    if(criterio1 == 0 || criterio2 == 0 || criterio3 == 0 ||criterio4 == 0){
        alert('rut SI es valido')
        frm.submit();
    }else{
        alert('rut NO es valido')
        event.preventDefault();
    }
});




function noPuntoComa( event ) {

    var e = event || window.event;
    var key = e.keyCode || e.which;

    if ( key === 110 || key === 190 || key === 188 ) {     
        e.preventDefault();     
    }
}