<html>
    <title>Start Main</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <script>
        function check() {
            var arrlo = document.getElementsByName("login");
            var arrpa = document.getElementsByName("pass");
            if (arrlo[0].value == "" && arrpa[0].value == ""){
                alert("Ведіть пароль і логін")
                return false;
            }
            if (arrlo[0].value == ""){
                alert("Введіть логін")
                return false;
            }
            arrpa = document.getElementsByName("pass");
            if (arrpa[0].value == ""){
                alert("Введіть пароль")
                return false;
            }
            return true;
        }
    </script>
    <body>
        <div id="header">
            <div id="logo"></div>
        </div>
        <div class="clr"></div>
        <div id="subHeader">
            <p>01:23:45:67:89:AB &nbsp; &nbsp; &nbsp; IP: 192.168.1.12</p>
        </div>
        <div id="wrapper">
            <div id="onver">
                <div id="tableHeader">
                    <h1 style="width: 20px">#</h1>
                    <h1 style="width: 60px">Name</h1>
                    <h1 style="width: 110px">Description</h1>
                    <h1 style="width: 130px">Collect Data Local</h1>
                    <h1 style="width: 110px">Curent Value</h1>
                </div>

                <div class="clr"></div>

                <div class="tableRow">
                    <h2 style="width: 20px">1</h2>
                    <a href=""><h2 style="width: 60px">Tag_1</h2></a>
                    <h2 style="width: 110px">Tag_1 Description</h2>
                    <h2 style="width: 130px">
                        <input name="check" type="checkbox"/>
                    </h2>
                    <h2 style="width: 110px"> 31331</h2>
                </div>

                <div class="clr"></div>

                <div class="tableRow">
                    <h2 style="width: 20px">3</h2>
                    <a href=""><h2 style="width: 60px">Tag_3</h2></a>
                    <h2 style="width: 110px">Tag_3 Description</h2>
                    <h2 style="width: 130px">
                        <input name="check" type="checkbox"/>
                    </h2>
                    <h2 style="width: 110px">Offline</h2>
                </div>

                <div class="clr"></div>

                <div class="tableRow">
                    <h2 style="width: 20px">4</h2>
                    <a href=""><h2 style="width: 60px">Tag_4</h2></a>
                    <h2 style="width: 110px">Tag_4 Description</h2>
                    <h2 style="width: 130px">
                        <input name="check" type="checkbox"/>
                    </h2>
                    <h2 style="width: 110px">166144</h2>
                </div>

                <div class="clr"></div>


                <div class="tableRow">
                    <h2 style="width: 20px">6</h2>
                    <a href=""><h2 style="width: 60px">Tag_6</h2></a>
                    <h2 style="width: 110px">Tag_6 Description</h2>
                    <h2 style="width: 130px">
                        <input name="check" type="checkbox"/>
                    </h2>
                    <h2 style="width: 110px">Online</h2>
                </div>
                <div class="clr"></div>
        </div><br/>
            <form name="form" method="post" onsubmit="return check()">
                <div id="wrapperlog">
                    <input type="text" name="login" placeholder="Логін"/><br/>
                    <input type="password" name="pass" placeholder="Пароль"/><br/>
                    <input type="submit" name="sbm" value="Вхід"/>
                </div>
            </form>
        
    </body>
</html>