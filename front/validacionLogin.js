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

function verificarPasswd(){
    let contra= document.getElementById("password").value;
    let errorContra= document.getElementById("passwordError");
    if(contra.lenght==0 || contra==null || contra==""){
        errorContra.innerHTML= "El campo no puede estar vacio";
        errorContra.style.color="red";
    }else{
        errorContra.innerHTML="";
    }
}