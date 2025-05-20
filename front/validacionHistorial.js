function verificarSexo(){
    let seleccion= document.getElementById("opcion").value;
    let errorSelec= document.getElementById("errorSelect");
    if(seleccion=== ""){
        errorSelec.textContent="Debes seleccionar una opción valida";
    }else{
        errorSelec.textContent="";
    }
}

function verificarFecha(){
    let fecha= document.getElementById("fecha").value;
    let errorFecha= document.getElementById("errorFecha");
    if(fecha== null || fecha== ""){
        errorFecha.textContent="El campo no puede estar vacio";
    }else{
        errorFecha.textContent="";
    }
}

function verificarMicrochip(){
    let micro= document.getElementById("micro").value;
    let errorMicro= document.getElementById("errorMicro");
    if(micro== null || micro== ""){
        errorMicro.textContent="El campo no puede estar vacio";
    }else if(!isNaN(micro)){
        errorMicro.textContent= "El campo no puede tener letras";
    }else{
        errorMicro.textContent="";
    }
}

function verificarTratamiento(){
    let tratamiento= document.getElementById("tratamiento").value;
    let errorTrata= document.getElementById("errorTrata");
    let sinNumeros= /^\d+$/;
    if(!sinNumeros.test(tratamiento)){
        errorTrata.textContent= "No se permiten solo numeros";
        errorTrata.style.color="red";
    }else{
        errorTrata.textContent="";
    }
}

function verificarAnimal(){
    let animal= document.getElementById("animal").value;
    let errorAnimal= document.getElementById("errorAnimal");
    if(animal==null || animal== ""){
        errorAnimal.textContent="El campo no puede estar vacio";
        errorAnimal.style.color="red";
    }else if(isNaN(animal)){
        errorAnimal.textContent="El campo debe ser un número";
        errorAnimal.style.color="red";
    }else{
        errorAnimal.textContent="";
    }
}