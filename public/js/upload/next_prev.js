const next_btn = document.querySelectorAll(".next");
const prev_btn = document.querySelectorAll(".prev");
const card_form = document.querySelector(".card_form form");
const inputs = document.querySelectorAll(".card_form form input");

const pages = document.querySelectorAll(".page");

const steps = document.querySelector(".steps");
const step = document.querySelectorAll(".steps .step");

const el = pages[0].parentNode;
console.log(el);

let count_btns = 0;

next_btn.forEach(element => {
  element.addEventListener("click", event => {
    event.preventDefault();
    card_form.scrollBy(300, 0);
    
    if(count_btns >= 0){
      count_btns += 1;
    }

    step[count_btns - 1].classList.add("complete");
    step[count_btns].classList.add("step_in");
  })
});

prev_btn.forEach(element => {
  element.addEventListener("click", event => {
    event.preventDefault();
    card_form.scrollBy(-300, 0);

    if(count_btns >= 1){
      count_btns -= 1;
    }

    console.log(step[count_btns]);
    console.log(next_btn[count_btns])

    step[count_btns].classList.remove("complete");
    step[count_btns + 1].classList.remove("step_in");
  });
});

