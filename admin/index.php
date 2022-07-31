<?php

    include("../includes/admin-nav.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Home Page</title>
    <link rel="stylesheet" href="../css/admin-style.css">

    <style>

        body{
            overflow: hidden;
        }
        .left-container::after{
            top: 70px;
        }

    </style>

</head>
<body>

    <div class="left-container">
        <div class="right-container">   
            <div class="main">

                <div class="cer">

                    <h3> Certificates </h3>

                    <ul class="cd">
                        <li> <a class="clink" href="view-birth.php"> View Birth Certificate </a></li> <br>
                        <li> <a class="clink" href="view-death.php"> View Death Certificate </a></li> <br>
                        <li> <a  class="clink" href="view-marriage.php"> View Marriage Certificate </a></li> <br>
                    </ul>

                </div>

                <div class="sch">

                    <h3> Schemes </h3>

                    <ul class="cd">
                        <li> <a class="clink" href="view-schemes.php"> View Schemes </a></li>     
                    </ul>

                </div>

            </div>
        </div>
    </div>

</body>
</html>