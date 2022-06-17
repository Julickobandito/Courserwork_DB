<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background: rgb(252, 189, 150);
            text-align: center;
        }
        .container{
            border: 2px solid rgb(126, 71, 45);
            width: 80%;
            margin: 0 auto;
            border-radius: 2px;
            padding: 3%;
        }
        h1, h3{
            text-align: left;
        }
        h1{
            margin: 0;
        }
        .border{
            border-bottom: 2px solid rgb(252, 156, 105);
            width: 98%;
        }
        .btn{
            padding: 10px 15px;
            margin: 4% 1%;
            width: 250px;
            height: 40px;
            border-radius: 2px;
            background: #190748;
            color: white;
            border: 2px solid #190748;
            font-weight: 700;
            text-decoration: none;
        }
        .btn:hover{
            transition: 1s;
            background: none;
            border: 2px solid #190748;
            color: #190748 ;

        }
        h1{
            margin-bottom: 2%;
        }
        h3 {
            margin-bottom:4%;
        }
        .btn-1{
            padding: 10px 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Menu</h1>
    <div class="border"></div>
    <h3>Administrating</h3>
    <a class="btn" href="load.php">Load tickets</a>
    <a class="btn" href="airplane.php">Airplanes</a>
    <a class="btn" href="airport.php">Airports</a>
    <a class="btn" href="airline.php">Airlines</a>
    <a class="btn" href="country.php">Countries</a>
    <a class="btn" href="terminal.php">Terminals</a>
    <h3>Registrar</h3>
    <a class="btn btn-1" href="registration_flight.php">Registration</a>
    <h3>Registration of baggage</h3>
    <a class="btn btn-1" href="registration_luggage.php">Registration</a>
</div>
</body>
</html>