function verificarNombre(){
    let nombre= document.getElementById("name").value;
    let errorNombre= document.getElementById("nameError");
    if(nombre==null || nombre==""){
        errorNombre.textContent= "El campo no puede estar vacio";
        errorNombre.style.color="red";
    }else{
        errorNombre.textContent="";
    }
}

function verificarEdad(){
    let edad= document.getElementById("age").value;
    let errorEdad= document.getElementById("ageError");
    if(edad==null || edad==""){
        errorEdad.textContent= "Este campo no puede estar vacio";
        errorEdad.style.color="red";
    }else if (edad <= 0){
        errorEdad.textContent= "Introduce una edad valida. No puede ser menor a 0";
        errorEdad.style.color="red";
    }else if(isNaN(edad)){
        errorEdad.textContent= "Es necesario que sea un numero";
        errorEdad.style.color="red";
    }
    else{
        errorEdad.textContent="";
    }
}

function verificarColor(){
    let color= document.getElementById("color").value;
    let errorColor= document.getElementById("errorColor");
    if(color== null || color==""){
        errorColor.textContent="No puedes dejar este campo vacio";
    }else if(!isNaN(color)){
        errorColor.textContent= "No se permiten numeros";
    }else{
        errorColor.textContent="";
    }
}

function tamAnimal(){
    let tam= document.getElementById("tam").value;
    let errorTam= document.getElementById("errorTam");
    if(tam== null || tam==""){
        errorTam.textContent= "El campo no puede estar vacio";
    }else if(isNaN(tam)){
        errorTam.textContent= "Solo se permiten numeros";
    }else{
        errorTam.textContent="";
    }
}

function pesoAnimal(){
    let peso= document.getElementById("peso").value;
    let errorPeso= document.getElementById("errorPeso");
    if(peso== null || peso==""){
        errorPeso.textContent="Campo vacio";
    }else if(isNaN(peso)){
        errorPeso.textContent="Solo se permiten numeros";
    }else{
        errorPeso.textContent="";
    }
}

function verificarDNIDueno(){
    let dni = document.getElementById("dniDueno").value;
    let errorDNI = document.getElementById("dniDuenoError");
    
    if(dni.length == 0 || dni == null || dni == ""){
        errorDNI.textContent = "El campo no puede estar vacio";
        errorDNI.style.color = "red";
    }else if(dni.length < 8){
        errorDNI.textContent = "El DNI debe tener al menos 8 caracteres";
        errorDNI.style.color = "red";
    }else if(dni.length > 8){
        errorDNI.textContent = "El DNI no puede tener más de 8 caracteres";
        errorDNI.style.color = "red";
    }else if(!/[a-zA-Z]/.test(dni)){
        errorDNI.textContent = "El DNI debe contener al menos una letra";
        errorDNI.style.color = "red";
    }else {
        errorDNI.textContent = "";
    }
}

function verificarEspecie(){
    let especie= document.getElementById("especie").value;
    let errorEspecie= document.getElementById("errorEspecie");
    if(especie== null || especie==""){
        errorEspecie.textContent="Campo vacio";
    }else if(isNaN(especie)){
        errorEspecie.textContent="Solo se permiten numeros";
    }else{
        errorEspecie.textContent="";
    }
}
function verificarRaza(){
    let raza= document.getElementById("raza").value;
    let errorRaza= document.getElementById("errorRaza");
    if(raza== null || raza==""){
        errorRaza.textContent="Campo vacio";
    }else if(isNaN(raza)){
        errorRaza.textContent="Solo se permiten numeros";
    }else{
        errorRaza.textContent="";
    }
}

function verificarDNIVeterinario(){
    let dni = document.getElementById("dniVete").value;
    let errorDNI = document.getElementById("dniVeteError");
    
    if(dni.length == 0 || dni == null || dni == ""){
        errorDNI.textContent = "El campo no puede estar vacio";
        errorDNI.style.color = "red";
    }else if(dni.length < 8){
        errorDNI.textContent = "El DNI debe tener al menos 8 caracteres";
        errorDNI.style.color = "red";
    }else if(dni.length > 8){
        errorDNI.textContent = "El DNI no puede tener más de 8 caracteres";
        errorDNI.style.color = "red";
    }else if(!/[a-zA-Z]/.test(dni)){
        errorDNI.textContent = "El DNI debe contener al menos una letra";
        errorDNI.style.color = "red";
    }else {
        errorDNI.textContent = "";
    }
}