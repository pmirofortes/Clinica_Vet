
// --> Botón del MENÚ
function cerrarmenu(){
    let menu = document.getElementById('menu');
    let bot = document.getElementById('boton');
    let layout = document.getElementById('layout');
    if(bot){
        menu.style.visibility = 'hidden';
        bot.style.visibility = 'visible';
        layout.style.visibility = 'visible';
    }
}

function abrirmenu(){
    let menu = document.getElementById('menu');
    let bot = document.getElementById('boton');
    let layout = document.getElementById('layout');
    if(menu){
        menu.style.visibility = 'visible';
        bot.style.visibility = 'hidden';
        layout.style.visibility = 'hidden';
    }
}


// --> Imágenes del menú
function imagenmascotas(){
    let imagen = document.getElementById('img_mascotas');

    imagen.style.visibility = 'visible';
}

function cerrar_imagenmascotas(){
    let imagen = document.getElementById('img_mascotas');

    imagen.style.visibility = 'hidden';
}

function imagenrazas(){
    let imagen = document.getElementById('img_razas');

    imagen.style.visibility = 'visible';
}

function cerrar_imagenrazas(){
    let imagen = document.getElementById('img_razas');

    imagen.style.visibility = 'hidden';
}

function imagenpropietarios(){
    let imagen = document.getElementById('img_propietarios');

    imagen.style.visibility = 'visible';
}

function cerrar_imagenpropietarios(){
    let imagen = document.getElementById('img_propietarios');

    imagen.style.visibility = 'hidden';
}

function registroM(){
    let imagen = document.getElementById('registroM');

    imagen.style.visibility = 'visible';
}

function cerrar_registroM(){
    let imagen = document.getElementById('registroM');

    imagen.style.visibility = 'hidden';
}

function registroE(){
    let imagen = document.getElementById('registroE');

    imagen.style.visibility = 'visible';
}

function cerrar_registroE(){
    let imagen = document.getElementById('registroE');

    imagen.style.visibility = 'hidden';
}

function registroR(){
    let imagen = document.getElementById('registroR');

    imagen.style.visibility = 'visible';
}

function cerrar_registroR(){
    let imagen = document.getElementById('registroR');

    imagen.style.visibility = 'hidden';
}

function registroP(){
    let imagen = document.getElementById('registroP');

    imagen.style.visibility = 'visible';
}

function cerrar_registroP(){
    let imagen = document.getElementById('registroP');

    imagen.style.visibility = 'hidden';
}

function registroU(){
    let imagen = document.getElementById('registroU');

    imagen.style.visibility = 'visible';
}

function cerrar_registroU(){
    let imagen = document.getElementById('registroU');

    imagen.style.visibility = 'hidden';
}

function registroEM(){
    let imagen = document.getElementById('registroEM');

    imagen.style.visibility = 'visible';
}

function cerrar_registroEM(){
    let imagen = document.getElementById('registroEM');

    imagen.style.visibility = 'hidden';
}

function registroEE(){
    let imagen = document.getElementById('registroEE');

    imagen.style.visibility = 'visible';
}

function cerrar_registroEE(){
    let imagen = document.getElementById('registroEE');

    imagen.style.visibility = 'hidden';
}

function registroER(){
    let imagen = document.getElementById('registroER');

    imagen.style.visibility = 'visible';
}

function cerrar_registroER(){
    let imagen = document.getElementById('registroER');

    imagen.style.visibility = 'hidden';
}


function registroEP(){
    let imagen = document.getElementById('registroEP');

    imagen.style.visibility = 'visible';
}

function cerrar_registroEP(){
    let imagen = document.getElementById('registroEP');

    imagen.style.visibility = 'hidden';
}

function registroEU(){
    let imagen = document.getElementById('registroEU');

    imagen.style.visibility = 'visible';
}

function cerrar_registroEU(){
    let imagen = document.getElementById('registroEU');

    imagen.style.visibility = 'hidden';
}

// VALIDACIONES
    // LOGIN
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