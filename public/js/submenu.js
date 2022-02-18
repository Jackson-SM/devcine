const btn_menu = document.querySelector('.btn-menu');
const submenu = document.querySelector('.submenu');
const iconRotate = document.querySelector('.menu .btn-menu i')

const link = document.querySelectorAll('.options form a')

btn_menu.addEventListener('click', function(event) {
  event.preventDefault();
  submenu.classList.toggle('open');
  iconRotate.classList.toggle('rotate');
})

link.forEach(element => {
  element.addEventListener('click', function(event) {
    event.preventDefault();
  })
})