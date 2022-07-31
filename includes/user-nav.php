<?php 

    include("../config/connection.php");
    
    session_start();
    
    $id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>

       *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

    </style>

</head>

<body>

    <div class="nav-header">

        <div class="wrapper">

            <input type="checkbox" id="btn">
            <label for="btn" class="menu-btn"><i class="fas fa-bars"></i></label>

            <nav id="sidebar">

                <?php

                    $query = " SELECT * FROM users WHERE u_id = '$id' ";
                    $result = mysqli_query($connect,$query);

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_array($result)){

                ?>

                <div class="title"  style="color: #f2f2f2;">

                    <i class="fas fa-user-circle"> </i>
                    <?php echo $row[1]; ?> 
                            
                </div>

                <?php

                        }
                    }

                ?>

                <ul class="list-items">
                        
                    <li><a href="profile.php"><i class="fas fa-user"></i> Profile </a></li>
                    <li><a href="view.php"><i class="fas fa-address-card"></i></i> View Applications </a></li>
                    <li><a href="feedback.php"><i class="fas fa-comment-dots"></i> Feedback </a></li>
                    <li><a href="about.html"><i class="fas fa-book-reader"></i></i> About Us </a></li>
                    <li><a href="../alerts/logout-user.html"><i class="fas fa-sign-out-alt"></i>  Log Out </a></li>

                </ul>

            </nav>

        </div>

    </div>

    <div class="header">

        <h2 style="margin-top: -10px; margin-right: 60px; color:#f2f2f2;"> Local Self Government Department </h2>
        <h4 style="color: red; margin-left: 540px; margin-top:5px;"> Government of Kerala </h4>

    </div>

</body>
</html>