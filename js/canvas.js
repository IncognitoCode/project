function Canvas(id){
    var map = document.getElementById(id);
    map.style.display = "block";
    var render = map.getContext("2d");
    var color = "#000";
    var width = 501;
    var height = 501;
    map.width = width;
    map.height = height;

    function X(x){
        return x + ((width-1) / 2 + 1);
    }
    function Y(y){
        return y + ((height-1) / 2 + 1);
    }

    this.fillBg = function(){
        render.fillStyle = color;
        render.fillRect(0, 0, width, height);
    }
    this.setColor = function(value){
        color = value;
    }
    this.drawDecart = function(){
        render.moveTo(X(0)-width/2, Y(0));
        render.lineTo(width, Y(0));
        render.moveTo(X(0), Y(0) - height / 2);
        render.lineTo(X(0), height);
        render.stroke();
    }
    this.drawEquation = function(a, b, c){
        render.fillStyle = "#fff";
        for(var x = 0; x < width / 2; x++){
            var y = c - a*x / b;
            render.fillRect(X(x), Y(y), 1, 1);
        }
    }
    this.lines = function(){
        render.moveTo(0, 0);
        render.lineTo(20, 20);
        render.lineTo(100, 20);
        render.lineTo(100, 40);
        render.stroke();
    }
}