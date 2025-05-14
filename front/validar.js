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