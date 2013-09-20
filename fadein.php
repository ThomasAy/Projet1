<?php
    include 'functions.php';
?>
<?php
    title("Accueil");
?>
<body onload="startPix()">

            <div class="slideshow-left">
                <p>
<script type="text/javascript">
<!--
var timeDelay = 2;
var Pix = new Array("img/dummy-640x310-1.jpg","img/dummy-640x310-2.jpg","img/dummy-640x310-3.jpg");
var howMany = Pix.length;
timeDelay *= 1000;
var PicCurrentNum = 0;
var PicCurrent = new Image();
PicCurrent.src = Pix[PicCurrentNum];
function startPix() {
    setInterval("slideshow()", timeDelay);
    setInterval("slideshow2()", timeDelay);

}
function doc(elt){
    return document.getElementById(elt);
}
function slideshow() {
    PicCurrentNum++;
    if (PicCurrentNum == howMany) {
        PicCurrentNum = 0;
    }
    doc('pixOne').style.filter = 'alpha(opacity=100)';
    doc('pixOne').style.opacity = 1;
    var interval = setInterval(function(){
        var level = (document.getElementById('pixOne').style.opacity * 100) - 20;
        doc('pixOne').style.filter = 'alpha(opacity='+level+')';
        doc('pixOne').style.opacity = (level/100);
        if(level <= 0){
            doc('pixOne').src = Pix[PicCurrentNum];
            doc('pixOne').style.opacity = 1;
            doc('pixOne').style.filter = 'alpha(opacity=100)';
            next = (PicCurrentNum == howMany - 1) ? 0 : PicCurrentNum+1;
            doc('pixTwo').src = Pix[next];
            clearInterval(interval);
        }
    }, 100);
}
//  End -->
</script>
                    <a href="http://www.google.fr"><img id="pixOne" src="img/dummy-640x310-1.jpg" style="position: absolute;z-index: 10" /></a>
                    <a href="http://www.google.com"><img id="pixTwo" src="img/dummy-640x310-2.jpg" style="position: absolute;z-index: 5" /></a>
                </p>
            </div>

            <div class="slideshow-right">
                <p>
<script type="text/javascript">
<!--
var timeDelay = 2;
var Pix = new Array("img/dummy-640x310-1.jpg","img/dummy-640x310-2.jpg","img/dummy-640x310-3.jpg");
var howMany = Pix.length;
timeDelay *= 1000;
var PicCurrentNum = 0;
var PicCurrent = new Image();
PicCurrent.src = Pix[PicCurrentNum];

function slideshow2() {
    PicCurrentNum++;
    if (PicCurrentNum == howMany) {
        PicCurrentNum = 0;
    }
    doc('pix3').style.filter = 'alpha(opacity=100)';
    doc('pix3').style.opacity = 1;
    var interval = setInterval(function(){
        var level = (document.getElementById('pixOne').style.opacity * 100) - 20;
        doc('pix3').style.filter = 'alpha(opacity='+level+')';
        doc('pix3').style.opacity = (level/100);
        if(level <= 0){
            doc('pix3').src = Pix[PicCurrentNum];
            doc('pix3').style.opacity = 1;
            doc('pix3').style.filter = 'alpha(opacity=100)';
            next = (PicCurrentNum == howMany - 1) ? 0 : PicCurrentNum+1;
            doc('pix4').src = Pix[next];
            clearInterval(interval);
        }
    }, 20);
}
//  End -->
</script>
                    <a href="http://www.google.fr"><img id="pix3" src="img/dummy-640x310-1.jpg" style="position: absolute;z-index: 10" /></a>
                    <a href="http://www.google.com"><img id="pix4" src="img/dummy-640x310-2.jpg" style="position: absolute;z-index: 5" /></a>
                </p>
            </div>
        
    </body>
</html>
