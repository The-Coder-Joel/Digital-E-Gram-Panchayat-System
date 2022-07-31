<?php

    session_start();

    include("../E-Gram Panchayat/config/connection.php");

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $account_type = $_POST['account_type'];

        if(empty($username)){
      
            header("location: login.php?error=User Name is Required...");

        }
        elseif(empty($password)){

            header("location: login.php?error=Password is Required...");

        }
        else{

            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND account_type = '$account_type'";
            $result = mysqli_query($connect,$query);       
        
            if(mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_array($result);

                if($row['username'] == $username && $row['password'] == $password && $row['account_type'] == 'Admin'){ 

                    echo "<script> alert('You are Successfully Logined....'); </script>";
                    header("Location:../E-Gram Panchayat/admin/index.php");

                }
                else if($row['username'] == $username && $row['password'] == $password && $row['account_type'] == 'User'){ 

                    echo "<script> alert('You are Successfully Logined....'); </script>";
                    header("Location:../E-Gram Panchayat/user/index.php");

                } 
                $email = $row['email'];
                $id = $row['u_id'];               
            }
            else{

                header("location: login.php?error=Account Doesn't Exists... "); 

            }

        }

        $_SESSION['id'] = $id;
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

    </style>
    
</head>
<body>

    <div class="left-container">
        <div class="right-container">

            <div class="container">

                <div class="l-left">

                    <div class="image-view">
                        <img class="image" src="../E-Gram Panchayat/images/logo.jpg">
                    </div>

                    <h3 class="head1"> Local Self Government Department </h3><br>
                    <h4 class="head2"> Government of Kerala </h4>

                    <div class="message">

                        <p> To Keep Connected With Us, <br> Please Login With Your Personal Info.</p>

                    </div>

                    <h4 class="link"> Don't have an Account ? <a href="register.php"> Register </a> </h4>

                    <p class="foot">Official Web Portal of Kerala Local Government, Government of Kerala.</p>
                    
                </div>

                <div class="l-right">

                    <form action="login.php" method="post" class="login">

                        <h2 style="text-align:center; padding-bottom: 15px; color: #00bfff;">LOGIN</h2>
                        
                        <?php 

                            if(isset($_GET['error'])){

                        ?>

                        <div class="alert alert-danger">
                           <?php echo $_GET['error'];  ?>
                        </div>

                        <?php

                            }

                        ?>
                       
                        <div class="mb-3">

                          <label for="username" class="form-label">User Name</label>
                          <input type="text" class="form-control" id="username" name="username">

                        </div>

                        <div class="mb-3">

                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password">

                        </div>

                        <label for="account type" class="form-label">Account Type</label>

                        <select class="form-select" name="account_type">
                            <option selected>--------Choose----------</option>
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>

                        <br>

                        <button type="submit" name="login">Login</button>

                    </form>

                </div>

            </div>

        </div>
    </div>    
    
</body>
</html>