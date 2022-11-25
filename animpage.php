<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/TweenMax.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>

</head>

<body>
    <h2 style="position:relative; Left:50px;">Animation Form</h2>
    <form action="" method="POST">
        <span style="font-size: 20px; position:absolute; Left: 50px;"> Animation Name </span> <input type="text" name="Aname" style="position:relative; Left: 250px;width:300px; height:30px"><br>
        <br>
        <span style="font-size: 20px;  position:absolute; Left: 50px;"> Animation Function </span> <input type="text" name="Afun" style="position:relative; Left: 250px; width:300px; height:30px"><br>
        <br>
        <input type="submit" name="submit" style="position:relative; Left:50px;">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['Aname'];
        $fun = $_POST['Afun'];

        $ress=mysqli_query($conn,"INSERT into anim values ('','$name','$fun')");
        

    }

    ?>

</body>

</html>