
const toggleBtn = document.querySelector('.toggle_btn');
const toggleBtnIcon = document.querySelector('.toggle_btn i');
const dropDownMenu = document.querySelector('.dropdown_menu');
const darkmodeButton = document.getElementById('darkmode');
const darkmodeButton2 = document.getElementById('darkmode2');

toggleBtn.onclick = function(){
    dropDownMenu.classList.toggle('open');
    const isOpen = dropDownMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen 
    ? 'bi bi-x-circle'   /* Cruz */
    : 'bi bi-list'    /* Barras */
}
darkmodeButton.onclick = function(){
    tema();
}
darkmodeButton2.onclick = function(){
    tema();
}
function tema() {
    location.href='components/darkmode.php';
}
