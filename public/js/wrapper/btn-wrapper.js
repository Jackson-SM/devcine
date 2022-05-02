const go = document.querySelector('.btn-wrapper-go');
const back = document.querySelector('.btn-wrapper-back');
const items_container = document.querySelector('#items');

go.addEventListener('click', event => {
  event.preventDefault();
  items_container.scrollBy(300,0);
})
back.addEventListener('click', event => {
  event.preventDefault();
  items_container.scrollBy(-300,0);
})