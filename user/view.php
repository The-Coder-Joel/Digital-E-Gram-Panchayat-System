<?php

    include("../config/connection.php");

    session_start();

    $id = $_SESSION['id'];

    $query = " SELECT * FROM users WHERE u_id = '$id' ";
    $result = mysqli_query($connect,$query);

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $username = $row[1];

        }
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> View Applications</title>
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
        .no{
            width: 300px;
            height: 200px;
            border: 1px dashed;
        }
        .no .fa-exclamation-triangle{
            color: #0bbfff;
            font-size: 50px;
            margin-bottom: 40px;
        }

    </style>

</head>
<body>   

    <a class="icon" href="../user/index.php"><i class="fas fa-chevron-circle-left"></i> Back </a>

    <div class="left-container">
        <div class="right-container">

            <div class="application-info">

                <?php

                    $query = "SELECT * FROM birth_certificate WHERE applicant = '$username' ";
                    $result = mysqli_query($connect,$query);

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_array($result)){
       
                ?>

                <div class="certificate">

                    <div class="status">

                        <h2> Birth Certificate </h2> <br><br><br>

                        <table>
                            
                            <tr>
                                <td> Application ID </td>
                                <td> <?php echo $row[1]; ?> </td>
                            </tr>

                            <tr>
                                <td> Application Status </td>
                                <td> <?php echo $row[9]; ?> </td>
                            </tr>

                        </table>

                        <?php

                            if($row[9] == 'Approved'){

                        ?>

                        <a href="view-birth-cert.php?view_id=<?php echo $row[0]; ?>" class="view"> VIEW </a>

                        <?php

                            }

                        ?>

                    </div>

                </div>

                <?php

                        }
                    }

                ?>

                <?php

                    $query = "SELECT * FROM death_certificate WHERE applicant = '$username' ";
                    $result = mysqli_query($connect,$query);

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_array($result)){
                           
                        
                ?>

                <div class="certificate">

                    <div class="status">

                        <h2> Death Certificate </h2> <br><br><br>

                        <table>

                            <tr>
                                <td> Application ID </td>
                                <td> <?php echo $row[1]; ?> </td>
                            </tr>

                            <tr>
                                <td> Application Status </td>
                                <td> <?php echo $row[9]; ?> </td>
                            </tr>

                        </table>

                        <?php

                            if($row[9] == 'Approved'){

                        ?>

                        <a href="view-death-cert.php?view_id=<?php echo $row[0]; ?>" class="view"> VIEW </a>

                        <?php

                            }

                        ?>

                    </div>

                </div>

                <?php

                        }
                    }
                    
                ?>

                <?php

                    $query = "SELECT * FROM marriage_certificate WHERE applicant = '$username' ";
                    $result = mysqli_query($connect,$query);

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_array($result)){
                           
                        
                ?>

                <div class="certificate">

                    <div class="status">

                        <h2> Marriage Certificate </h2> <br><br><br>

                        <table>

                            <tr>
                                <td> Application ID </td>
                                <td> <?php echo $row[1]; ?> </td>
                            </tr>

                            <tr>
                                <td> Application Status </td>
                                <td> <?php echo $row[9]; ?> </td>
                            </tr>

                        </table>

                        <?php

                            if($row[9] == 'Approved'){

                        ?>

                        <a href="view-marri-cert.php?view_id=<?php echo $row[0]; ?>" class="view"> VIEW </a>

                        <?php

                            }

                        ?>

                    </div>

                </div>

                <?php

                        }
                    }
                    
                ?>

                <?php

                    $query = "SELECT * FROM applications WHERE applicant = '$username' ";
                    $result = mysqli_query($connect,$query);

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_array($result)){
                           
                        
                ?>

                <div class="scheme">

                    <div class="status">

                        <h2>Scheme</h2> <br><br><br>

                        <table>

                            <tr>
                                <td> Application ID </td>
                                <td> <?php echo $row[1]; ?> </td>
                            </tr>

                            <tr>
                                <td> Application Status </td>
                                <td> <?php echo $row[6]; ?> </td>
                            </tr>

                        </table>

                        <?php

                            if($row[6] == 'Approved'){

                        ?>

                        <a href="view-scheme.php?view_id=<?php echo $row[0]; ?>" class="view"> VIEW </a>

                        <?php

                            }

                        ?>
                        
                    </div>

                </div>

                <?php
                
                        }

                    }
                    else{

                ?>

                <div class="scheme">

                    <div class="status">

                        <table>

                            <th class="no">

                                <i class="fas fa-exclamation-triangle"></i>
                                <h4 style="font-size: 17px; color:red"> NO MORE APPLICATIONS TO SHOW </h4>

                            </th>

                        </table>

                    </div>

                </div>

                <?php

                    }

                ?>

            </div>

        </div>
    </div>
    
</body>
</html>