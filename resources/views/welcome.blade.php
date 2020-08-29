<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>விசிக</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <meta name="description" content="Stop the Hassle. Start deploi'ing. Use Ploi.io for easy site deployments. We take all the difficult work out of your hands, so you can focus on doing what you love: developing your application.">

    <style>
        html, body {
            background-color: #fff;
            color: #000000;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        img {
            max-width: 600px;
        }

        .full-height {
            height: 40vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 24px;
        }

        .links > a {
            color: #000;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        #particles-js canvas {
            position: absolute;
            width: 100%;
            height: 100%;

        }

        .floating {
            animation: floatUpAndDown 2s infinite ease-in;
        }

        .floating-shadow {
            transform-origin: center;
            animation: shadowScale 2s infinite ease-in;
        }

        @-webkit-keyframes floatUpAndDown {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(5%);
            }
            100% {
                transform: translateY(0);
            }
        }

        @-webkit-keyframes shadowScale {
            0% {
                transform: scaleX(1)
            }
            50% {
                transform: scaleX(0.75);
            }
            100% {
                transform: scaleX(1);
            }
        }


        @media (max-width: 450px) {
            .title {
                font-size: 48px;
            }

            img {
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref">
        <img src="images/header.png" class="flex-center" style="text-align: center;">
    </div>
<div class="flex-center position-ref full-height">
    <div class="content">
        <br><br>
        <div class="links">
            <a class="btn" href="{{ url('application-pondichery') }}"><img border="0" alt="apply button" src="images/button.png"></a>
        </div>
    </div>
</div>
</body>
</html>
