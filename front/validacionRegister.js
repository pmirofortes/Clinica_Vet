function verificarDNI(){
    let dni = document.getElementById("dni").value;
    let errorDNI = document.getElementById("dniError");
    
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

function verificarNombre(){
    let usuario= document.getElementById("name").value;
    let errorUsuario= document.getElementById("nameError");
    if(usuario==null || usuario==""){
        errorUsuario.textContent= "El campo no puede estar vacio";
        errorUsuario.style.color="red";
    }else{
        errorUsuario.textContent="";
    }
}

function verificarApellidos(){
    let surname= document.getElementById("surname").value;
    let errorSurname= document.getElementById("surnameError");
    if(surname==null || surname==""){
        errorSurname.textContent= "El campo no puede estar vacio";
        errorSurname.style.color="red";
    }else{
        errorSurname.textContent="";
    }
}

function verificarEdad(){
    let edad= document.getElementById("age").value;
    let errorEdad= document.getElementById("ageError");
    if(edad==null || edad==""){
        errorEdad.textContent= "Este campo no puede estar vacio";
        errorEdad.style.color="red";
    }else if (edad < 18){
        errorEdad.textContent= "Introduce una edad valida. No puede ser menor a 18 años";
        errorEdad.style.color="red";
    }else if(isNaN(edad)){
        errorEdad.textContent= "Es necesario que sea un numero";
        errorEdad.style.color="red";
    }
    else{
        errorEdad.textContent="";
    }
}

function verificarLocalidad(){
    let localidad= document.getElementById("localidad").value;
    let errorLocalidad= document.getElementById("errorLocalidad");
    let sinNumeros= /^\d+$/;
    if(!sinNumeros.test(localidad)){
        errorLocalidad.textContent= "No se permiten solo numeros";
        errorLocalidad.style.color="red";
    }else{
        errorLocalidad.textContent="";
    }
}

function verificarTelefono(){
    let telefono= document.getElementById("telef").value;
    let errorTelefono= document.getElementById("errorTelef");
    let soloNumeros= /^\d{7,15}$/;
    if(!soloNumeros.test(telefono)){
        errorTelefono.textContent= "Telefono invalido";
        errorTelefono.style.color="red";
    }else{
        errorTelefono.textContent="";
    }
}

function verificarEmail(){
    let email= document.getElementById("email").value;
    let errorEmail= document.getElementById("emailError");
    if(!(/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(email))){
        errorEmail.textContent= "El formato de email no es valido";
        errorEmail.style.color="red";
    }else{
        errorEmail.textContent="";
    }
}

function verifyPassword(){
    let contra1= document.getElementById("password").value;
    let contra2= document.getElementById("pass2").value;
    let errorContra1= document.getElementById("passwordError");
    let errorContra2= document.getElementById("pass2Error");

    if(contra1==null || contra1==""){
        errorContra1.textContent= "El campo no puede estar vacio";
        errorContra1.style.color="red"; 
    }else if(contra1.length<8){
        errorContra1.textContent= "La contraseña no puede ser menor de 8 caracteres";
        errorContra1.style.color="red";
    }else if(!/[A-Z]/.test(contra1) && !/\d/.test(contra1)){
        errorContra1.textContent= "La contraseña debe tener al menos una mayuscula y un numero";
        errorContra1.style.color="red";
    }else if(!/\d/.test(contra1)){
            errorContra1.textContent= "La contraseña debe tener al menos un numero";
            errorContra1.style.color="red";
    }else if(!/[A-Z]/.test(contra1)){
            errorContra1.textContent= "La contraseña debe tener al menos una mayuscula";
            errorContra1.style.color="red";
    }else{
        errorContra1.textContent="";
    }
    if(contra1!=contra2){
        errorContra2.textContent= "Las contraseñas no coinciden";
        errorContra2.style.color="red";
    }else{
        errorContra2.textContent="";
    }
}

