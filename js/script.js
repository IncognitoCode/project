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
//Метод Крамера, я даю собі дупля, то моя лаба з методів обчислень. Роздуплись, бо я буду писати такі завдання на JS.
    function determinant(a11,a12,a13,a21,a22,a23,a31,a32,a33)
    {
        var d;
        d = a11*a22*a33+a12*a23*a31+a13*a21*a32;
        d = d-a13*a22*a31-a12*a21*a33-a11*a23*a32;

        return d;
    }

    function button1()
    {
        var d;
        var d1,d2,d3;
        var a11,a12,a13,b1;
        var a21,a22,a23,b2;
        var a31,a32,a33,b3;
        var x1,x2,x3;

        a11 = -5;  a12 = 3;   a13 = 71;   b1 = -32;
        a21 = 8;   a22 = 5;   a23 = 82;   b2 = -21;
        a31 = 4;   a32 = 7;   a33 = 99;   b3 = -15;

        d = determinant(a11,a12,a13,a21,a22,a23,a31,a32,a33);
        document.write('d=' + d + '<br>');

        d1 = determinant(b1,a12,a13,b2,a22,a23,b3,a32,a33);
        document.write('d1=' + d1 + '<br>');

        d2 = determinant(a11,b1,a13,a21,b2,a23,a31,b3,a33);
        document.write('d2=' + d2 + '<br>');

        d3 = determinant(a11,a12,b1,a21,a22,b2,a31,a32,b3);
        document.write('d3=' + d3 + '<br>');

        x1 = d1/d;
        document.write('x1=' + x1 + '<br>');

        x2 = d2/d;
        document.write('x2=' + x2 + '<br>');

        x3 = d3/d;
        document.write('x3=' + x3 + '<br>');
    }

    document.write('Метод Крамера =' + '<br>');

    button1();