<?php 
    
    include("../config/connection.php");

    session_start();

    $id = $_SESSION['id'];

    if(isset($_GET['user'])){

        $username = $_GET['user'];

        if(isset($_POST['update'])){

            $updated_name = $_POST['updated-name'];
            $updated_email = $_POST['updated-email'];

            $update_query1 = " UPDATE users SET username = '$updated_name', email = '$updated_email' WHERE u_id = '$id'";
            $update_result1 = mysqli_query($connect,$update_query1);

            $update_query2 = " UPDATE applications SET applicant = '$updated_name' WHERE applicant = '$username'";
            $update_result2 = mysqli_query($connect,$update_query2);

            $update_query3 = " UPDATE birth_certificate SET applicant = '$updated_name' WHERE applicant = '$username'";
            $update_result3 = mysqli_query($connect,$update_query3);

            $update_query4 = " UPDATE death_certificate SET applicant = '$updated_name' WHERE applicant = '$username'";
            $update_result4 = mysqli_query($connect,$update_query4);

            $update_query5 = " UPDATE marriage_certificate SET applicant = '$updated_name' WHERE applicant = '$username'";
            $update_result5 = mysqli_query($connect,$update_query5);

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/user-style.css">
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

    <a class="icon" href="../user/index.php"><i class="fas fa-chevron-circle-left"></i> Back </a>

    <div class="left-container">
        <div class="right-container">

            <div class="profile-info">

                <i class="fas fa-user-circle"></i>  

                <div class="profile-details">

                    <?php

                        $query = " SELECT * FROM users WHERE u_id = '$id' ";
                        $result = mysqli_query($connect,$query);

                        if(mysqli_num_rows($result) > 0){

                            while($row = mysqli_fetch_array($result)){

                    ?>

                    <form action="profile.php?user=<?php echo $row[1]; ?>" method="POST">

                            <input type="text" name="updated-name" value="<?php echo $row[1]; ?>">
                            <input type="email" name="updated-email" value="<?php echo $row[2]; ?>" >

                        <div class="button">

                            <button name="update" class="update"> <i class="far fa-edit"></i> UPDATE </button>

                        </div>

                    </form>

                    <?php

                                }
                            }

                    ?>

                </div>  
                         
            </div>

        </div>   
    </div>

</body>
</html>