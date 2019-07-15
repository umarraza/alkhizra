<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>White Board</title>

    <link href="{{ asset('/public/css/screen.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="{{ asset('/public/js/screen.js') }}"></script>

</head>
<body>
    <canvas id="myCanvas" width="300" height="150" style="border:1px solid #d3d3d3;">Your browser does not support the HTML5 canvas tag.</canvas>
    <canvas id="myCanvas2" width="300" height="150" style="border:1px solid #d3d3d3;">Your browser does not support the HTML5 canvas tag.</canvas>

    <script>
        var c = document.getElementById("myCanvas");
        var d = document.getElementById("myCanvas2");

        var ctx = c.getContext("2d");
        var dtx = d.getContext("2d");

        ctx.fillStyle = "blue";
        ctx.fillRect(10, 10, 50, 50);

        function copy() {

            var imgData = ctx.getImageData(10, 10, 50, 50);
            var imgData1 = dtx.getImageData(10, 10, 50, 50);
           console.log(string);
            ctx.putImageData(imgData, 10, 70);
            dtx.putImageData(imgData, 10, 70);

        }
    </script>
    <script>
    
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.fillStyle = "red";
        ctx.fillRect(10, 10, 50, 50);

        function copy() {
            var imgData = ctx.getImageData(10, 10, 50, 50);
            ctx.putImageData(imgData, 10, 70);
        }
    </script>
<button onclick="copy()">Copy</button>

</body>
</html>