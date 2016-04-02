<html>
    <head>
        <title>Canvas</title>
        <meta charset="utf-8" />
        <script src="js/canvas.js"></script>
        <script>
            var map;
            window.onload = function(){
                map = new Canvas("map");
            }
            function fill(){
                map.fillBg();
                map.drawDecart();
                map.drawEquation(4,6,3)
                map.lines();
            }
            function setColor(color){
                map.setColor(color);
            }
        </script>
        <style>

            #map{
                display: none;
            }
        </style>
    </head>
    <body>
        <canvas id="map"></canvas>
        <button onclick="fill()">Fill</button>
        <button onclick="setColor('#333')">Color</button>
    </body>
</html>