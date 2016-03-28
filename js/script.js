function hideBig(){
    var big = document.getElementById("big");
    big.style.display = "none";
}
function showBig(s){
    var big = document.getElementById('big');
    big.style.display = 'block';
    var shadow = document.getElementById('shadow');
    shadow.style.display = 'block';
    var img = "../images/"+s+".jpg";
    big.style.background = "url('"+img+"')";
}
