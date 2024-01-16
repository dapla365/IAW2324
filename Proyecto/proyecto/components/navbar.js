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
    cambiarDark();

    darkmode.classList.toggle('oscuro');
    const isDark = darkmode.classList.contains('oscuro');
    darkmode.classList = isDark 
    ? 'bi bi-brightness-high-fill oscuro'   /* Sol */
    : 'bi bi-moon-fill'    /* Luna */
}

darkmode2.onclick = function(){
    cambiarDark();

    darkmode2.classList.toggle('oscuro');
    const isDark = darkmode2.classList.contains('oscuro');
    darkmode2.classList = isDark 
    ? 'bi bi-brightness-high-fill oscuro'   /* Sol */
    : 'bi bi-moon-fill'    /* Luna */
}

function cambiarDark(){
    document.body.classList.toggle('dark');
    document.getElementById('footer').classList.toggle('dark');
    try {document.getElementById('incidencias').classList.toggle('dark');} catch (error) {}
    try {document.getElementById('incidencias_pendientes').classList.toggle('dark');} catch (error) {}
    try {document.getElementById('incidencias_completadas').classList.toggle('dark');} catch (error) {}
    try {document.getElementById('incidencias_create').classList.toggle('dark');} catch (error) {}
    try {document.querySelector('.table-dark').classList.toggle('dark_th');} catch (error) {}
}