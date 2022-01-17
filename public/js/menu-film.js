const btn_option = document.querySelectorAll('.btn-option');
const dropdown = document.querySelectorAll('.options');

btn_option.forEach(element => {
  element.addEventListener('click', function(event) {
    event.preventDefault();
    dropdown.forEach(dropdowns => {
      dropdowns.classList.toggle('open');
    })
  })
});