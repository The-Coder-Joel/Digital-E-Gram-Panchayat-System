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
    <title>Admin's Home Page</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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

                    <i class="fas fa-user-cog"></i> 
                    <?php echo $row[1]; ?> 

                </div>

                <?php

                        }
                    }

                ?>

                <ul class="list-items"> 

                    <li><a href="profile.php"><i class="fas fa-user-secret"></i> Profile </a></li>
                    <li><a href="feedbacks.php"><i class="fas fa-comment-dots"></i> Feedbacks </a></li>
                    <li><a href="edit.php"><i class="fas fa-edit"></i>Edit </a></li>
                    <li><a href="../alerts/logout-admin.html"><i class="fas fa-sign-out-alt"></i>  Log Out </a></li>

                </ul>

            </nav>

        </div>

    </div>

    <div class="header">

        <h2>ADMIN'S DASHBOARD</h2>
        
    </div>

</body>    
</html>