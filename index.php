<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>S V G</title>
</head>
<body>
    <svg id="svg" width="250" height="250" viewBox="0 0 250 250">
        <polygon points=" 100,10 40,198 190,78 10,78 160,198"
                 style=" fill:silver;stroke:violet;" onclick="rotateON()">
            <animateTransform id="star"
                              attributeName="transform"
                              attributeType="xml"
                              dur="10s"
                              type="rotate"
                              from="0 100 100"
                              to="360 100 100"
                              fill="freeze"
                              repeatCount="indefinite" />
        </polygon>
        Your Browser does not support SVG!
    </svg>

    <canvas id="canvas" width="400" height="400"></canvas>

    <p id=" para2"> This is SVG & Canvas Application</p>
    <p id="para1" align="center">HAFSA MASROOR</p>
    <style>
        #para1{
            color:#0a3a8f;
            font-family:'Comic Sans MS';
            font-size:larger;
            font-style:initial;
        }
        #para2{
            position:center;

        }
        #svg{
            position:relative;
            left:800px;
        }
    </style>
    <script >
        function rotateON() {
            document.getElementById('star').removeAttribute('begin');
        }

        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        var W = 400, H = 400;
        var particles = [];

        for (var i = 0; i < 40; i++) {
            particles.push(new create_particle());
        }

        function create_particle() {
            this.x = Math.random() * W;
            this.y = Math.random() * H;
            this.vx = Math.random() * 20 - 10;
            this.vy = Math.random() * 20 - 10;
            var r = Math.random() * 255 >> 0;
            var g = Math.random() * 255 >> 0;
            var b = Math.random() * 255 >> 0;
            this.color = "rgba(" + r + ", " + g + ", " + b + ", 0.5)";

            this.radius = Math.random() * 20 + 20;
        }

        var x = 100; var y = 100;

        //Lets animate the particle
        function draw() {
            ctx.globalCompositeOperation = "source-over";            
            ctx.fillStyle = "rgba(0, 0, 0, 0.3)";
            ctx.fillRect(0, 0, W, H);
            ctx.globalCompositeOperation = "lighter";
            for (var t = 0; t < particles.length; t++) {
                var p = particles[t];
                ctx.beginPath();
                var gradient = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.radius);
                gradient.addColorStop(0, "white");
                gradient.addColorStop(0.4, "white");
                gradient.addColorStop(0.4, p.color);
                gradient.addColorStop(1, "black");

                ctx.fillStyle = gradient;
                ctx.arc(p.x, p.y, p.radius, Math.PI * 2, false);
                ctx.fill();
                p.x += p.vx;
                p.y += p.vy;
                if (p.x < -50) p.x = W + 50;
                if (p.y < -50) p.y = H + 50;
                if (p.x > W + 50) p.x = -50;
                if (p.y > H + 50) p.y = -50;
            }
        }

        setInterval(draw, 33);

    </script>

</body>
</html>
