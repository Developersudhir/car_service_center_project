// Loader 
var loader=document.querySelector(".loader");
window.addEventListener("load",()=>{
  loader.style.display="none";
});   
  /// Opening createadmin Box
    openCreateAdmin=()=>{
        document.querySelector('.createadmin').classList.add('visible');
      }
      /// Closing createadmin Box
      let cross=document.getElementById("cros");
      cross.addEventListener("click",()=>{
        document.querySelector(".createadmin").classList.remove("visible");
      });
      /// Opening createadmin Box
      openUpdateAdmin=()=>{
        document.querySelector('.updateadmin').classList.add('visible');
      }
      /// Closing createadmin Box
      let cros1=document.getElementById("cros1");
      cros1.addEventListener("click",()=>{
        document.querySelector(".updateadmin").classList.remove("visible");
      });