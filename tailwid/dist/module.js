let mob=document.querySelector(".mob");
let liste=document.querySelector(".liste");
let ouvert=document.querySelector(".ouvert");
let fermer=document.querySelector(".fermer");
let isdown=true;

mob.addEventListener("click",()=>{
  
  if(isdown)
  {
  liste.classList.add("top-[12%]","opacity-100");
  ouvert.classList.add("hidden","duration-500");
  fermer.classList.remove("hidden");
 
}
else{
  liste.classList.remove("top-[12%]","opacity-100");
  ouvert.classList.remove("hidden");
  fermer.classList.add("hidden","duration-200");
}

isdown=!isdown;

});
 
let text=document.querySelector(".test");
let arrow=document.querySelectorAll(".fleche");
arrow.forEach(element => {

        element.addEventListener("click", () => {
                // Inverser la rotation de l'icône de flèche
            element.classList.toggle("rotate-180");
            // Trouver l'élément parent qui contient la réponse
            let parentTab = element.closest('.tab');
            // Trouver l'élément .answer associé à l'élément parent
            let answer = parentTab.querySelector('.answer');
            // Appliquer ou supprimer la classe .h-full sur l'élément .answer
            answer.classList.toggle("h-full");
            
  
});
});
  
let ischecked=true;
let oeil=document.querySelector(".oeil");
let oeilf=document.querySelector(".oeilf");
let passwordInput = document.querySelector("input[type='password']");

oeilf.addEventListener("click", () => {
    
        oeilf.classList.add("hidden");
        oeil.classList.remove("hidden");
        passwordInput.type = "text"; // Rend le mot de passe visible
   
})
oeil.addEventListener("click", () => {
    
        oeil.classList.add("hidden");
        oeilf.classList.remove("hidden");
        passwordInput.type = "password"; // Rend le mot de passe visible
    
})