function resizeWindow()
{
  window.resizeBy(100,100);
}




window.onload = function()
      {
          //var imgWidth = document.getElementById("ceinture").width; 
          //document.getElementById("APropos").style.left = parseInt(imgWidth) + "px";
          //alert(parseInt(imgWidth));
            
      };



$(document).ready(function(){
  var MEASUREMENTS_ID = 'measurements'; // abstracted-out for convenience in renaming
  $("body").append('<div id="'+MEASUREMENTS_ID+'"></div>');
  $("#"+MEASUREMENTS_ID).css({
      'position': 'fixed',
      'bottom': '0',
      'right': '0',
      'background-color': 'black',
      'color': 'white',
      'padding': '5px',
      'font-size': '10px',
      'opacity': '0.4'
  });
  getDimensions = function(){
      return $(window).width() + ' (' + $(document).width() + ') x ' + $(window).height() + ' (' + $(document).height() + ')';
  }
  $("#"+MEASUREMENTS_ID).text(getDimensions());
  $(window).on("resize", function(){
      $("#"+MEASUREMENTS_ID).text(getDimensions());
  });
});

