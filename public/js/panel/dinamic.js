const graphicBtn = document.querySelector("#graphic_btn");
const contentDashboard = document.querySelector(".content_dashboard");

async function renderGraphic(){
  let response = await fetch("/public/js/panel/arquivo.html");
  let blob = await response.blob();
  let text = await blob.text();
  contentDashboard.innerHTML = text;
}

graphicBtn.addEventListener("click", e => {
  e.preventDefault();

  renderGraphic();
})