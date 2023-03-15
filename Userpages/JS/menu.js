const anothermenu=document.querySelector(".anothermenu");
const container= document.querySelector(".container");

anothermenu.addEventListener("click",() =>{
    container.classList.toggle("active");
})