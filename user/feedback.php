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
    <title> Feedback </title>
    <link rel="stylesheet" href="../css/user-style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
        <div class=" right-container">

            <div class="contact-info"></div>

            <div class="contact-form">

                <h2>Feedback</h2>

                <form action="../process/feedback.php" method="POST">

                    <div class="form-box">

                        <?php

                            $query = " SELECT * FROM users WHERE u_id = '$id' ";
                            $result = mysqli_query($connect,$query);

                            if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_array($result)){

                        ?>

                        <div class="input-box">

                            <input type="text" name="fname" value="<?php echo $row[1]; ?>" required>
                            <span> First Name </span>

                        </div>

                        <div class="input-box">

                            <input type="text" name="lname" required>
                            <span> Last Name </span>

                        </div>

                        <div class="input-box">

                            <input type="email" name="email" value="<?php echo $row[2]; ?>" required>
                            <span> E-Mail </span>

                        </div>

                        <?php

                                }
                            }

                        ?>

                        <div class="input-box">

                            <input type="number" name="phone" required>
                            <span> Mobile </span>

                        </div>

                        <div class="input-box">

                            <textarea required name="message"></textarea>
                            <span>Write your Message here....</span>

                        </div>

                        <button class="btn" name="submit" onclick=""> Send </button>

                    </div>

                </form>           

            </div>

        </div>
    </div>   

</body>
</html>