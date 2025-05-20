function validarNombreEspecie(){
    let nombre= document.getElementById("name").value;
    let errorNombre= document.getElementById("errorNombre");
    if(nombre==null || nombre==""){
        errorNombre.textContent= "El campo no puede estar vacio";
        errorNombre.style.color="red";
    }else{
        errorNombre.textContent="";
    }
}

function validarNombreCientifico(){
    let nombreCien= document.getElementById("nameCien").value;
    let errorNombreCien= document.getElementById("errorNombreCien");
    if(nombreCien==null || nombreCien==""){
        errorNombreCien.textContent= "El campo no puede estar vacio";
        errorNombreCien.style.color="red";
    }else{
        errorNombreCien.textContent="";
    }
}

function clasifEspecie(){
    let seleccion= document.getElementById("opcion").value;
    let errorSelec= document.getElementById("errorSelect");
    if(seleccion=== ""){
        errorSelec.textContent="Debes seleccionar una opción valida";
    }else{
        errorSelec.textContent="";
    }
}

