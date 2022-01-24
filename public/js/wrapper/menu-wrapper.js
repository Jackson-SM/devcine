const menu_wrapper = document.querySelector('.menu-wrapper')
const btn_menu_wrapper = document.querySelector('.btn-menu-wrapper')

btn_menu_wrapper.addEventListener('click', event => {
  event.preventDefault();
  menu_wrapper.classList.toggle('active');
})