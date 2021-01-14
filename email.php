<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen E2</title>
    <style>
        form{
            width: 30%;
            margin: 30px auto;
            background-color: lightyellow;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input{
            margin: 15px;
            padding: 10px;
            display: block;
        }
        label{
            width: 50%;
            margin: 5px auto;
            text-align: center;
        }
        #mensaje{
            background-color: red;
            color: white;
            width: 30%;
            margin: 10px auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="validarmail.php" method="GET">
    <label for="usermail">Introduzca un E-mail</label>
        <input type="text" name="usermail" placeholder="EJ: micorreo@ejemplo.com">
        <input type="submit" name="enviamail" value="ENVIAR">
    </form>
    <div id="mensaje">
        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                session_unset();
            }
        ?>
    </div>
    
</body>
</html>