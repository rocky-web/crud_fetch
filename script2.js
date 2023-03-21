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
        msje_rut.innerHTML=""
        rut.placeholder="Campo obligatorio";
        document.getElementById('rut').classList.remove("ok_campo");
        document.getElementById('rut').classList.add("error_campo");
        console.log('campo rut VACIO');
        // document.getElementById('rut').classList.add("error_campo");
        // rut.style.backgroundColor = "yellow";
    }else if(rut.value !== null || rut.value !== ''){
        

        var texto = rut.value;
        var criterio1 = texto.search(/(^\d{1,2})(\.)(\d{3})(\.)(\d{3})(\-)(\d|\k)\b/gim)
        var criterio2 = texto.search(/^\d{7}(\k|\d)\b/gim)
        var criterio3 = texto.search(/^\d{8}(\k|\d)\b/gim)
        var criterio4 = texto.search(/(^\d{7,8}\-)(\k|\d)\b/gim)

        if(criterio1 == 0 || criterio2 == 0 || criterio3 == 0 ||criterio4 == 0){
            msje_rut.innerHTML=""
            document.getElementById('rut').classList.remove("error_campo");
            document.getElementById('rut').classList.add("ok_campo");
            // document.getElementById('rut').classList.remove("error_campo");
            // rut.style.backgroundColor = "white";
            
           console.log("rut SI es valido");
           var res1 = "rut SI es valido";
           
        }else{
            msje_rut.innerHTML="Formato rut no válido"
            console.log('rut NO es valido');
            document.getElementById('rut').classList.remove("ok_campo");
            document.getElementById('rut').classList.add("error_campo");
            // document.getElementById('rut').classList.add("error_campo")
            // e.preventDefault();
        }
    }

    if(nombre.value === null || nombre.value === ''){
        msje_nom.innerHTML=""
        nombre.placeholder="Campo obligatorio";
        document.getElementById('nombre').classList.remove("ok_campo");
        document.getElementById('nombre').classList.add("error_campo");
        // nombre.style.backgroundColor = "yellow";
    }else if(nombre.value !== null || nombre.value !== ''){
        var texto = nombre.value;
        var criterio5 = texto.search(/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]{3,50}$/)

        if(criterio5 == 0){
            msje_nom.innerHTML="";
            document.getElementById('nombre').classList.remove("error_campo");
            document.getElementById('nombre').classList.add("ok_campo");
            nombre.placeholder="";
            console.log("nombre SI es valido");
            var res2 = "nombre SI es valido";
            // nombre.style.backgroundColor = "";
           
        }else{
            msje_nom.innerHTML="Debe contener minimo 3 caracteres, Solo letras"
            document.getElementById('nombre').classList.remove("ok_campo")
            document.getElementById('nombre').classList.add("error_campo")
            console.log('nombre NO es valido');
            // e.preventDefault();
        }
       
    }

    if(apellidos.value === null || apellidos.value === ''){
        msje_ape.innerHTML=""
        document.getElementById('apellidos').classList.remove("ok_campo")
        document.getElementById('apellidos').classList.add("error_campo")
        apellidos.placeholder="Campo obligatorio";
        // apellidos.style.backgroundColor = "yellow";
    }else if(apellidos.value !== null || apellidos.value !== ''){
        document.getElementById('apellidos').classList.remove("error_campo");
        document.getElementById('apellidos').classList.add("ok_campo");
        var texto = apellidos.value;
        var criterio6 = texto.search(/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]{3,50}$/)
        /*  apellidos.style.backgroundColor = "";
         apellidos.placeholder=""; */

        if(criterio6 == 0){
            msje_ape.innerHTML=""
            document.getElementById('apellidos').classList.remove("error_campo");
            document.getElementById('apellidos').classList.add("ok_campo");
            console.log("apellidos SI es valido");
            var res3 = "apellidos SI es valido";
            // apellidos.style.backgroundColor = "";
            // apellidos.placeholder="";
           
        }else{
            msje_ape.innerHTML="Debe contener minimo 3 caracteres, Solo letras"
            document.getElementById('apellidos').classList.remove("ok_campo")
            document.getElementById('apellidos').classList.add("error_campo")
            console.log('apellidos NO es valido');
            // e.preventDefault();
        }

    }

    if(empresa.value === null || empresa.value === ''){
        msje_emp.innerHTML=""
        document.getElementById('empresa').classList.remove("ok_campo");
        document.getElementById('empresa').classList.add("error_campo");
        // empresa.style.backgroundColor = "yellow";
        empresa.placeholder="Campo obligatorio";
    }else if(empresa.value !== null || empresa.value !== ''){
        document.getElementById('empresa').classList.add("ok_campo");
        var texto = empresa.value;
        var criterio7 = texto.search(/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]{3,50}$/)
        document.getElementById('empresa').classList.remove("error_campo");
        /* empresa.style.backgroundColor = "";
        empresa.placeholder=""; */
        if(criterio7 == 0){
            msje_emp.innerHTML=""
            document.getElementById('empresa').classList.remove("error_campo");
            document.getElementById('empresa').classList.add("ok_campo");
            empresa.placeholder="";
            console.log("empresa SI es valido");
            var res4 = "empresa SI es valido";
            // empresa.style.backgroundColor = "";
           
        }else{
            msje_emp.innerHTML="Debe contener minimo 3 caracteres, Puede ser alfanuméricos"
            document.getElementById('empresa').classList.remove("ok_campo");
            document.getElementById('empresa').classList.add("error_campo");
            console.log('empresa NO es valido');
            // e.preventDefault();
        }
    }

    // SECCION
   if(seccion.value !== null || seccion.value !== ''){
        var texto = seccion.value;
        var criterio8 = texto.search(/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]{3,30}$/)

       if(texto == ''){
            msje_sec.innerHTML=""
            document.getElementById('seccion').classList.remove("error_campo");
            document.getElementById('seccion').classList.add("ok_campo");
            console.log('seccion vacio SI es valido');
            var res5 = "seccion SI es valido";
            // e.preventDefault();
        }else if(criterio8 == 0){
            msje_sec.innerHTML=""
            document.getElementById('seccion').classList.remove("error_campo");
            document.getElementById('seccion').classList.add("ok_campo");
            console.log("seccion SI es valido");
            var res5 = "seccion SI es valido";
            // seccion.style.backgroundColor = "";
            //  seccion.placeholder=""; 
            
         }else if(criterio8 == -1){
            msje_sec.innerHTML="Puede estar vacio o Debe contener minimo 3 caracteres, Puede ser alfanuméricos"
            document.getElementById('seccion').classList.remove("ok_campo");
            document.getElementById('seccion').classList.add("error_campo");
            console.log("seccion NO es valido");
         }
    }

    // PATENTE (VALIDAR PATENTE EXP REG)
   if(patente.value !== null || patente.value !== ''){
        var texto = patente.value;
        var criterio9 = texto.search(/(^[a-zA-Z]{4}[0-9]{2}$)|(^[a-zA-Z]{3}[0-9]{2}$)|(^[a-zA-Z]{2}[0-9]{4}$)|(^[a-zA-Z]{2}[0-9]{3}$)|(^[0-9]{2}[a-zA-Z]{4}$)|(^[0-9]{4}[a-zA-Z]{2}$)|(^[0-9]{2}[a-zA-Z]{3}$)|(^[0-9]{3}[a-zA-Z]{2}$)/)

       if(texto == ''){
            msje_pat.innerHTML=""
            document.getElementById('patente').classList.remove("error_campo");
            document.getElementById('patente').classList.add("ok_campo");
            console.log('patente vacio SI es valido');
            var res6 = "patente SI es valido";
            // e.preventDefault();
        }else if(criterio9 == 0){
            msje_pat.innerHTML=""
            document.getElementById('patente').classList.remove("error_campo");
            document.getElementById('patente').classList.add("ok_campo");
            console.log("patente SI es valido");
            var res6 = "patente SI es valido";
            // seccion.style.backgroundColor = "";
            //  seccion.placeholder=""; 
            
         }else if(criterio9 == -1){
            msje_pat.innerHTML="Puede estar vacio. Debe contener entre 5 a 6 caracteres en formato patente chilena"
            document.getElementById('patente').classList.remove("ok_campo");
            document.getElementById('patente').classList.add("error_campo");
            console.log("patente NO es valido");
         }
    }

    // OBSERVACIONES
   if(observaciones.value !== null || observaciones.value !== ''){
        var texto = observaciones.value;
        var criterio10 = texto.search(/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]{3,30}$/)

       if(texto == ''){
        msje_obs.innerHTML=""
            document.getElementById('observaciones').classList.remove("error_campo");
            document.getElementById('observaciones').classList.add("ok_campo");
            console.log('observaciones vacio SI es valido');
            var res7 = "observaciones SI es valido";
            // e.preventDefault();
        }else if(criterio10 == 0){
            msje_obs.innerHTML=""
            document.getElementById('observaciones').classList.remove("error_campo");
            document.getElementById('observaciones').classList.add("ok_campo");
            console.log("observaciones SI es valido");
            //  seccion.style.backgroundColor = "";
            //  seccion.placeholder=""; 
            var res7 = "observaciones SI es valido";
            
         }else if(criterio10 == -1){
            msje_obs.innerHTML="Puede estar vacio o Debe contener minimo 3 caracteres, Puede ser alfanuméricos"
            document.getElementById('observaciones').classList.remove("ok_campo");
            document.getElementById('observaciones').classList.add("error_campo");
            console.log("observaciones NO es valido");
         }
    }


   

    if(rut.value !== null && rut.value !== '' && nombre.value !== null && nombre.value !== '' && apellidos.value !== null && apellidos.value !== '' && empresa.value !== null && empresa.value !== ''){
        rut.placeholder="Rut";
        nombre.placeholder="Nombre";
        apellidos.placeholder="Apellidos";
        empresa.placeholder="Empresa";

        var datos = new FormData(frm);
        var respuesta = document.getElementById("respuesta");
            
        function resp_fetch(){ 
            return fetch('duplicado.php', {
                method: 'POST',
                body: datos
            })
            .then( res => res.json())
            .then( data => {
                // console.log(data);
                if(data === 'duplicado' && registrar.value=='Registrar'){
                    msje_rut.innerHTML="El rut ingresado ya existe"
                    rut.style.cssText="background-color: red; color: white;"
                    console.log("el rut ya existe");
                    return "rut SI duplicado";
                    // respuesta.innerHTML = `<div>El rut ingresado ya existe</div>`
                }else if(data === 'duplicado' && registrar.value=='Actualizar'){
                    respuesta.innerHTML = `<div></div>`
                    return "rut actualizar ok";
                    // registrado(); 
                }else if(data === 'dato ok'){
                    respuesta.innerHTML = `<div></div>`
                    return "rut registrar ok";
                    // registrado(); 
                }

            })  // end fetch
            
        } // end resp_fetch  

        async function respuesta_fetch(){
            var res = await resp_fetch();
            // console.log("funcion asincrona: "+res);
            if(res1=="rut SI es valido" && res !== "rut SI duplicado" && res2 == "nombre SI es valido" && res3 == "apellidos SI es valido" && res4 == "empresa SI es valido" &&  res5 == "seccion SI es valido" && res6 == "patente SI es valido" && res7 == "observaciones SI es valido"){
                registrado();
            }
            
        }
        respuesta_fetch();

    }  // end if

}); // end event clic

/* function noPuntoComa( event ) {
    
    var e = event || window.event;
    var key = e.keyCode || e.which;
    
    if ( key === 110 || key === 190 || key === 188 ) {     
        e.preventDefault();     
    }
} */
