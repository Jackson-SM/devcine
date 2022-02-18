const btn_open_dropdown = document.querySelector('.option-li .button-open-dropdown')
const dropdown_option = document.querySelector('.dropdown-option')

btn_open_dropdown.addEventListener('click', event => {
  event.preventDefault();
  dropdown_option.classList.toggle('open');
})