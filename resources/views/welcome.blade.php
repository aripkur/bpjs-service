<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web service antrean RSUI Boyolali</title>

    <!-- Styles -->
    <style>
        body {
            padding: 0px;
            margin: 0px;
        }

        @keyframes kedip {
            0% {
                background: red;
            }

            50% {
                background: green;
            }

            50.1% {
                background: blue;
            }

            100% {
                background: white;
            }
        }

        .hello {
            animation: kedip 2s linear infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            background: white;
        }

        .hello p {
            padding: 10px 50px;
            background: white;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="hello">
        <p>Halo</p>
    </div>
</body>
</html>
