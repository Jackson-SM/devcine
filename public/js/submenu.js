const btn_menu = document.querySelector('.btn-menu');
const submenu = document.querySelector('.submenu');
const iconRotate = document.querySelector('.menu .btn-menu i')

btn_menu.addEventListener('click', function(event) {
  event.preventDefault();
  submenu.classList.toggle('close');
  iconRotate.classList.toggle('rotate');
})