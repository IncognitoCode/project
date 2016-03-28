function hideBig() {
    var big = document.getElementById("big");
    big.style.display = "none";
    var shadow = document.getElementById('shadow');
    shadow.style.display = 'none';
}
function showBig(s) {
    var big = document.getElementById('big');
    big.style.display = 'block';
    var shadow = document.getElementById('shadow');
    shadow.style.display = 'block';
    var img = "images/"+s+".jpg";
    big.style.background = "url("+img+")";
}
function nextImage() {
    var big = document.getElementById("big");
    var bg = big.style.backgroundImage;
    var next = Number(bg[12])+1;
    if(next > 9)
        showBig(1);
    else
        showBig(next);
}