function verificarRaza(){
    let raza= document.getElementById("raza").value;
    let errorRaza= document.getElementById("razaError");
    if(raza==null || raza==""){
        errorRaza.textContent= "El campo no puede estar vacio";
        errorRaza.style.color="red";
    }else{
        errorRaza.textContent="";
    }
}