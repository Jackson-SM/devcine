const items = document.querySelector('#items');

items.addEventListener('wheel', event => {
  event.preventDefault();
  if(event.deltaY > 0 ){
    event.target.scrollBy(300,0)
  }else {
    event.target.scrollBy(-300,0)
  }
})