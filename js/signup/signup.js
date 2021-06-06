let inputContent = document.querySelector('.input-box');
let nextContent = document.querySelector(".next-content");
let btn = document.querySelector(".nextbtn");
let nxtbtn = document.querySelector(".nxtbtn");
let profile =  document.querySelector(".profileContainer");
let signbtn =  document.querySelector("#signbtn");
    
btn.addEventListener('click',()=>{
   inputContent.style.display="none";
   nextContent.style.display="block";
   btn.classList.add("nxtbtn");
  
   for(let i =0; i<=btn.classList.length;i++){
       let count = btn.classList[i];
   if(count == "nxtbtn"){
      
       btn.addEventListener('click',()=>{
        profile.style.display="block";
        nextContent.style.display="none";
        btn.style.display="none";
        signbtn.style.display="block";
      
      
    });
}
}
});



 