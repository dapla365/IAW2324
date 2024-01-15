const toggleBtn = document.querySelector('.toggle_btn');
const toggleBtnIcon = document.querySelector('.toggle_btn i');
const dropDownMenu = document.querySelector('.dropdown_menu');
const darkmode = document.querySelector('.dropdown_menu');
const lightmode = document.querySelector('.dropdown_menu');

toggleBtn.onclick = function(){
    dropDownMenu.classList.toggle('open')
    const isOpen = dropDownMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen 
    ? 'bi bi-x-circle'   /* Cruz */
    : 'bi bi-list'    /* Barras */
}