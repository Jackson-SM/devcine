const btnExit = document.querySelector('.exit-notific');
const notification = document.querySelector('.notification');

btnExit.addEventListener('click', event => {
  event.preventDefault();
  notification.classList.toggle('exit');
})