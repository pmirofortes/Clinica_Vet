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
        errorColor.style.color="red";
    }else if(!isNaN(color)){
        errorColor.textContent= "No se permiten numeros";
        errorColor.style.color="red";
    }else{
        errorColor.textContent="";
    }
}

function tamAnimal(){
    let tam= document.getElementById("tam").value;
    let errorTam= document.getElementById("errorTam");
    if(tam== null || tam==""){
        errorTam.textContent= "El campo no puede estar vacio";
        errorTam.style.color="red";
    }else if(isNaN(tam)){
        errorTam.textContent= "Solo se permiten numeros";
        errorTam.style.color="red";
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
        errorPeso.style.color="red";
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
    }else if(dni.length < 9){
        errorDNI.textContent = "El DNI debe tener al menos 9 caracteres";
        errorDNI.style.color = "red";
    }else if(dni.length > 9){
        errorDNI.textContent = "El DNI no puede tener más de 9 caracteres";
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
        errorEspecie.style.color="red";
    }else if(isNaN(especie)){
        errorEspecie.textContent="Solo se permiten numeros";
        errorEspecie.style.color="red";
    }else{
        errorEspecie.textContent="";
    }
}
function verificarRaza(){
    let raza= document.getElementById("raza").value;
    let errorRaza= document.getElementById("errorRaza");
    if(raza== null || raza==""){
        errorRaza.textContent="Campo vacio";
        errorRaza.style.color="red";
    }else if(isNaN(raza)){
        errorRaza.textContent="Solo se permiten numeros";
        errorRaza.style.color="red";
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
    }else if(dni.length < 9){
        errorDNI.textContent = "El DNI debe tener al menos 9 caracteres";
        errorDNI.style.color = "red";
    }else if(dni.length > 9){
        errorDNI.textContent = "El DNI no puede tener más de 9 caracteres";
        errorDNI.style.color = "red";
    }else if(!/[a-zA-Z]/.test(dni)){
        errorDNI.textContent = "El DNI debe contener al menos una letra";
        errorDNI.style.color = "red";
    }else {
        errorDNI.textContent = "";
    }
}

function verificarDNI(){
    let dni = document.getElementById("dni").value;
    let errorDNI = document.getElementById("dniError");
    
    if(dni.length == 0 || dni == null || dni == ""){
        errorDNI.textContent = "El campo no puede estar vacio";
        errorDNI.style.color = "red";
    }else if(dni.length < 9){
        errorDNI.textContent = "El DNI debe tener al menos 9 caracteres";
        errorDNI.style.color = "red";
    }else if(dni.length > 9){
        errorDNI.textContent = "El DNI no puede tener más de 9 caracteres";
        errorDNI.style.color = "red";
    }else if(!/[a-zA-Z]/.test(dni)){
        errorDNI.textContent = "El DNI debe contener al menos una letra";
        errorDNI.style.color = "red";
    }else {
        errorDNI.textContent = "";
    }
}

function verificarNombre(){
    let usuario = document.getElementById("nombre").value;
    let errorUsuario = document.getElementById("errorNombre");
    if(usuario == null || usuario == ""){
        errorUsuario.textContent = "El campo no puede estar vacio";
        errorUsuario.style.color = "red";
    }else{
        errorUsuario.textContent = "";
    }
}

function verificarApellidos(){
    let surname= document.getElementById("apellidos").value;
    let errorSurname= document.getElementById("errorApellidos");
    if(surname==null || surname==""){
        errorSurname.textContent= "El campo no puede estar vacio";
        errorSurname.style.color="red";
    }else{
        errorSurname.textContent="";
    }
}

function verificarEdad(){
    let edad= document.getElementById("fecha").value;
    let errorEdad= document.getElementById("errorFecha");
    if(edad==null || edad==""){
        errorEdad.textContent= "Este campo no puede estar vacio";
        errorEdad.style.color="red";
    }else if (edad < 18){
        errorEdad.textContent= "Introduce una edad valida. No puede ser menor a 18 años";
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
    if(localidad==null || localidad==""){
        errorLocalidad.textContent= "El campo no puede estar vacio";
        errorLocalidad.style.color="red";
    }else if(!sinNumeros.test(localidad)){
        errorLocalidad.textContent= "No se permiten numeros";
        errorLocalidad.style.color="red";
    }else{
        errorLocalidad.textContent="";
    }
}

function verificarTelefono(){
    let telefono= document.getElementById("telefono").value;
    let errorTelefono= document.getElementById("errorTelefono");
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
    let errorEmail= document.getElementById("errorMail");
    if (email==null || email==""){
        errorEmail.textContent= "El campo no puede estar vacio";
        errorEmail.style.color="red";

        }else if(!(/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(email))){
        errorEmail.textContent= "El formato de email no es valido";
        errorEmail.style.color="red";
    }else{
        errorEmail.textContent="";
    }
}


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

function verificarDNI(){
    let dni = document.getElementById("dni").value;
    let errorDNI = document.getElementById("dniError");
    
    if(dni.length == 0 || dni == null || dni == ""){
        errorDNI.textContent = "El campo no puede estar vacio";
        errorDNI.style.color = "red";
    }else if(dni.length < 9){
        errorDNI.textContent = "El DNI debe tener al menos 9 caracteres";
        errorDNI.style.color = "red";
    }else if(dni.length > 9){
        errorDNI.textContent = "El DNI no puede tener más de 9 caracteres";
        errorDNI.style.color = "red";
    }else if(!/[a-zA-Z]/.test(dni)){
        errorDNI.textContent = "El DNI debe contener al menos una letra";
        errorDNI.style.color = "red";
    }else {
        errorDNI.textContent = "";
    }
}

function verificarPasswd(){
    let contra= document.getElementById("password").value;
    let errorContra= document.getElementById("errorPassword");
    if(contra.lenght==0 || contra==null || contra==""){
        errorContra.innerHTML= "El campo no puede estar vacio";
        errorContra.style.color="red";
    }else{
        errorContra.innerHTML="";
    }
}

function verificarConfirmPasswd(){
    let contra= document.getElementById("confirmPassword").value;
    let errorContra= document.getElementById("errorConfirmPassword");
    if(contra.lenght==0 || contra==null || contra==""){
        errorContra.innerHTML= "El campo no puede estar vacio";
        errorContra.style.color="red";
    }else{
        errorContra.innerHTML="";
    }
}

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
        errorSelec.style.color="red";
    }else{
        errorSelec.textContent="";
    }
}

