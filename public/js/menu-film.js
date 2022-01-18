const btn_option = document.querySelectorAll('.btn-option');

btn_option.forEach((element,indice) => {
  element.addEventListener('click', function(event) {
    event.preventDefault();
    const dropdown = document.querySelectorAll('.options');
    dropdown[indice].classList.toggle('open');
  })
});