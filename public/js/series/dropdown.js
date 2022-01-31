const btn_menu = document.querySelector('#btn-menu');
const dropdown = document.querySelector('#btn-menu ~ .dropdown');

btn_menu.addEventListener('click', event => {
  event.preventDefault();
  dropdown.classList.toggle('open');
})