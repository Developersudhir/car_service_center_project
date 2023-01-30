  // Loader 
  var loader=document.querySelector(".loader");
  window.addEventListener("load",()=>{
    loader.style.display="none";
  });
  /// Opening login Box
   openLogIn=()=>{
    document.querySelector('.loginbox').classList.add('visible');
  }
  /// Closing login Box
  let cross=document.getElementById("cross");
  cross.addEventListener("click",()=>{
    document.querySelector(".loginbox").classList.remove("visible");
  });
  /////// Scroll To TOP
  let roc=document.getElementById('rocket');
  roc.addEventListener('click',()=>{
    window.scrollTo(0,0);
  });