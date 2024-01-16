const toggleBtn = document.querySelector('.toggle_btn');
const toggleBtnIcon = document.querySelector('.toggle_btn i');
const dropDownMenu = document.querySelector('.dropdown_menu');
const darkmode = document.getElementById('darkmode');
const darkmode2 = document.getElementById('darkmode2');

toggleBtn.onclick = function(){
    dropDownMenu.classList.toggle('open');
    const isOpen = dropDownMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen 
    ? 'bi bi-x-circle'   /* Cruz */
    : 'bi bi-list'    /* Barras */
}
darkmode.onclick = function(){
    darkmode.classList.toggle('oscuro');
    document.body.classList.toggle('dark');
    document.getElementById('footer').classList.toggle('dark');
    document.getElementById('incidencias').classList.toggle('dark');
    document.getElementById('incidencias_pendientes').classList.toggle('dark');
    document.getElementById('incidencias_completadas').classList.toggle('dark');
    const isDark = darkmode.classList.contains('oscuro');

    darkmode.classList = isDark 
    ? 'bi bi-brightness-high-fill oscuro'   /* Sol */
    : 'bi bi-moon-fill'    /* Luna */
}

darkmode2.onclick = function(){
    darkmode2.classList.toggle('oscuro');
    document.body.classList.toggle('dark');
    document.getElementById('footer').classList.toggle('dark');
    document.getElementById('incidencias').classList.toggle('dark');
    document.getElementById('incidencias_pendientes').classList.toggle('dark');
    document.getElementById('incidencias_completadas').classList.toggle('dark');
    
    const isDark = darkmode2.classList.contains('oscuro');

    darkmode2.classList = isDark 
    ? 'bi bi-brightness-high-fill oscuro'   /* Sol */
    : 'bi bi-moon-fill'    /* Luna */
}