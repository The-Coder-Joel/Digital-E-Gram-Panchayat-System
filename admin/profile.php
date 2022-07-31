<?php 
    
    include("../config/connection.php");

    session_start();

    $id = $_SESSION['id'];

    if(isset($_POST['update'])){

        $updated_name = $_POST['updated-name'];
        $updated_email = $_POST['updated-email'];

        $update_query = " UPDATE users SET username = '$updated_name', email = '$updated_email' WHERE u_id = '$id'";
        $update_result = mysqli_query($connect,$update_query);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/admin-style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .icon{
            font-size: 20px;
            text-decoration: none;
            color: #f2f2f2;
        }
        .icon{
            font-size: 30px;
        }
        .icon,.fa-chevron-circle-left{
            font-size: 30px;
            margin-top: 37px;
            padding-top: 20px;
            padding-left: 20px;
        }

    </style>

</head>
<body>
    
    <a class="icon" href="../admin/index.php"><i class="fas fa-chevron-circle-left"></i> Back </a>

    <div class="left-container">
        <div class="right-container">
            <div class="profile-info">

                <i class="fas fa-user-secret"></i> 

                <div class="profile-details">

                    <form action="profile.php" method="post">

                        <?php

                            $query = " SELECT * FROM users WHERE u_id = '$id' ";
                            $result = mysqli_query($connect,$query);

                            if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_array($result)){

                        ?>

                        <input type="text" name="updated-name" value="<?php echo $row[1]; ?>">
                        <input type="email" name="updated-email" value="<?php echo $row[2]; ?>" >


                        <div class="button">
                            <button name="update" class="update"> <i class="far fa-edit"></i> UPDATE </button>
                        </div>

                        <?php

                                }

                            }

                        ?>

                    </form>

                </div>   
                        
            </div>
        </div>   
    </div>

</body>
</html>