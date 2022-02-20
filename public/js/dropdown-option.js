const btn_open_dropdown = document.querySelectorAll('.option-li .button-open-dropdown')
const dropdown_option = document.querySelectorAll('.dropdown-option')
btn_open_dropdown.forEach(function(element,index) {
  element.addEventListener('click', event => {
    event.preventDefault();
    dropdown_option[index].classList.toggle('open');
  })
})