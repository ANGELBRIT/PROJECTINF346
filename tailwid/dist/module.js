let mob=document.querySelector(".mob");
let liste=document.querySelector(".liste");
let ouvert=document.querySelector(".ouvert");
let fermer=document.querySelector(".fermer");
let isdown=true;

mob.addEventListener("click",()=>{
  
  if(isdown)
  {
  liste.classList.add("top-[15%]","opacity-100");
  ouvert.classList.add("hidden","duration-500");
  fermer.classList.remove("hidden");
 
}
else{
  liste.classList.remove("top-[15%]","opacity-100");
  ouvert.classList.remove("hidden");
  fermer.classList.add("hidden","duration-200");
}

isdown=!isdown;

});
