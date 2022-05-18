const next_btn = document.querySelectorAll(".next");
const prev_btn = document.querySelectorAll(".prev");
const card_form = document.querySelector(".card_form form");
const inputs = document.querySelectorAll(".card_form form input");

inputs.forEach(element => {
  element.addEventListener('input', event => {
    console.log(event.target.value);
  })
})

next_btn.forEach(element => {
  element.addEventListener("click", event => {
    event.preventDefault();
    card_form.scrollBy(300, 0);
  })
});

prev_btn.forEach(element => {
  element.addEventListener("click", event => {
    event.preventDefault();
    card_form.scrollBy(-300, 0);
  });
});

