function resizeWindow()
{
  window.resizeBy(100,100);
}




window.onload = function()
      {
          var pageWidth = window.innerWidth; 
          var size = (pageWidth - 200 ) / 2;

document.getElementById("search").style.marginLeft = size + "px";
          //alert(size);
      };

