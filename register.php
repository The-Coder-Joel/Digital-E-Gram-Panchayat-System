<?php

    session_start();

    include("../E-Gram Panchayat/config/connection.php");

    if(isset($_POST['register'])){
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $account_type = $_POST['account_type'];

        if(empty($username)){

            header("location: register.php?error=User Name is Required...");

        }
        elseif(empty($email)){

            header("location: register.php?error=E-Mail is Required...");

        }
        elseif(empty($password)){

            header("location: register.php?error=Password is Required...");

        }
        elseif($password == $cpassword){

            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($connect,$query);

            if(!mysqli_num_rows($result)>0){

                $query ="INSERT INTO users (username,email,password,account_type) VALUES ('$username','$email','$password','$account_type')";
                $result = mysqli_query($connect,$query);

                if($result){

                    $query = "SELECT * FROM users WHERE username = '$username'";
                    $result = mysqli_query($connect,$query);

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_array($result)){

                            $id = $row[0];
                        
                        }
                    
                    }

                    header("location:../E-Gram Panchayat/user/index.php");

                }
                else{

                    header("location:register.php?error=Oops! Something went wrong...."); 

                }
            }
            else{

                header("location:register.php?error=Oops! E-Mail Already Exists....");

            }   

        }
        else{

            header("location:register.php?error=Password Does not Match...");    

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
    <title>Register</title>
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

                <div class="r-left">

                    <form action="register.php" method="post" class="login">

                        <h2 style="text-align:center; padding-bottom: 15px; color: #00bfff;">REGISTER</h2>

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
                          <input type="text" class="form-control" id="username" name="username" >

                        </div>

                        <div class="mb-3">

                            <label for="email" class="form-label">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" >

                        </div>

                        <div class="mb-3">

                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >

                        </div>

                        <div class="mb-3">

                          <label for="password" class="form-label">Confirm Password</label>
                          <input type="password" class="form-control" id="password" name="cpassword" >

                        </div>

                        <label for="account type" class="form-label">Account Type</label>

                        <select class="form-select" name="account_type">
                            <option selected>--------Choose----------</option>
                            <option value="User">User</option>
                            <option value="Admin" disabled>Admin</option>
                        </select>

                        <br>

                        <button type="submit" name="register">Register</button>

                    </form>

                </div>

                <div class="r-right">

                    <div class="image-view">
                        <img class="image" src="../E-Gram Panchayat/images/logo.jpg">
                    </div>

                    <h3 class="head1"> Local Self Government Department </h3><br>
                    <h4 class="head2"> Government of Kerala </h4>

                    <div class="message">

                        <p> Enter Your Personal Informations <br> And Start Journey With Us...</p>
                        
                    </div>

                    <h4 class="link"> Already have an Account ? <a href="login.php">Login</a> </h4>
                    <p class="foot">Official Web Portal of Kerala Local Government, Government of Kerala.</p>

                </div>

            </div>
            
        </div>
    </div>
    
</body>
</html>