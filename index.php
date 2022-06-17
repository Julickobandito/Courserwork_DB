<?php
include('connect.php');
//var_dump($db);
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>#plane {
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;

        }
        .video-wrapper {
            margin: 0 auto;
            backdrop-filter: blur(10px);
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container{
            width: 70%;
            margin: 0 auto;
        }
        .wrapper{
            padding: 2%;
            background: rgba(229, 134, 79, 0.48);
            margin-top: 2% ;
            border-radius: 10px;
        }
        body{
            font-size: 13px;
            font-family: 'Klee One', cursive;
            text-align: center;
            background: url(airplane_taking_off.jpg) no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(10px);
            color: white;
        }
        #btn{
            font-family: 'Klee One', cursive;
            margin-top: 1% ;
            width: 250px;
            height: 50px;
            border-radius: 10px;
            background: #190748;
            color: white;
            border: none;
            font-weight: 700;
            margin-bottom: 9%;
        }
        #btn:hover{
            transition: 1s;
            background: none;
            border: 2px solid #190748;
            color: #190748 ;

        }
        #info{
            text-align: right;
            font-weight: 600;
            margin-top: 3%;
            font-size: 15px;
        }
        </style>
</head>
<body>
    <div class="container">
    <div class="wrapper">
        <h1>About</h1>
        <h2>WEB-додаток на тему "Облік пасажирів в аеропорту"</h2>
        <hr>
        <p>У аеропорту існує два термінали: термінал А для внутрішніх рейсів і термінал Б – для міжнародних. Пасажир прибуває до аеропорту і стає на реєстрацію до відповідного терміналу. При реєстрації перевіряються документи і авіаквиток пасажира, при міжнародному перельоті додатково перевіряється віза пасажира. Під час реєстрації додатково перевіряється, чи не є пасажир у внутрішньому або міжнародному розшуку (Інтерпол), при необхідності інформуються відповідні органи. В разі вдалої реєстрації відбувається оформлення і перевірка багажу. Якщо об'єм або вага багажу пасажира перевищує припустимі норми, то виписується квитанція на додаткову оплату перевезення. За 10 хвилин до відправки рейса реєстрація пасажирів припиняється, формується остаточний список пасажирів і багажу. На підставі сформованих списків власники авіакомпаній приймають рішення про скорочення або збільшення числа рейсів: - якщо кількість пасажирів менше заданої норми рентабельності рейсу, то приймається рішення по скороченню кількості рейсів. - якщо літак завантажений на 95%, то розглядається варіант по збільшенню частоти польотів рейсів у даному напрямі.</p>
        <p id="info">Розробила студентка групи ІС-03 Козюк Юлія. ФІОТ, КПІ</p>
    </div>
        <a href="Menu.php"><input type="button" value="Розпочати роботу" id="btn"></a>
    </div>

</body>
</html>