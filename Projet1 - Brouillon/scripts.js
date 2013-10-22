function resizeWindow()
{
  window.resizeBy(100,100);
}




window.onload = function()
      {
          var pageWidth = window.innerWidth; 
          if (pageWidth < 768) {
            //alert(pageWidth);
            //document.getElementById("btnValider").style.display = "none";
          };
      };

