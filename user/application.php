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
    <title> Application </title>
    <link rel="stylesheet" href="../css/user-style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            align-items:center;
            justify-content: center;
        }
        .left-container{
            margin-top: 0;
        } 

    </style>

</head>
<body>

    <div class="left-container">
        <div class="right-container">

            <div class="application">

                <div class="wrapper">

                    <h3>Application</h3> 

                </div> 

                <form action="../uploads/application.php" method="POST" enctype="multipart/form-data">

                    <div class="apply">

                        <table>

                            <?php

                                $query = " SELECT * FROM users WHERE u_id = '$id' ";
                                $result = mysqli_query($connect,$query);

                                if(mysqli_num_rows($result) > 0){

                                    while($row = mysqli_fetch_array($result)){

                            ?>

                            <tr>

                                <td> Applicant </td>
                                <td>
                                    <?php echo $row[1]; ?>
                                    <input type="hidden" name="applicant" value="<?php echo $row[1]; ?>">
                                </td>

                            </tr>

                            <tr>

                                <td> E-Mail </td>
                                <td>
                                    <?php echo $row[2]; ?>
                                    <input type="hidden" name="email" value="<?php echo $row[2]; ?>">
                                </td>

                            </tr>

                            <?php

                                    }
                                }

                            ?>

                            <?php

                                if(isset($_GET['scheme_id'])){

                                    $scheme_id = $_GET['scheme_id'];

                                    $query = " SELECT * FROM schemes WHERE s_id = $scheme_id ";
                                    $result = mysqli_query($connect,$query);

                                    if(mysqli_num_rows($result) == 1){

                                        $row = mysqli_fetch_assoc($result);

                                    }

                                }

                            ?>

                            <tr>

                                <td> Scheme </td>
                                <td> 
                                    <?php echo $row['scheme']; ?>
                                    <input type="hidden" name="scheme" value="<?php echo $row['scheme']; ?>">
                                </td>

                            </tr>

                            <tr>

                                <td> Required Documents </td>
                                <td>
                                    <?php echo $row['req_doc']; ?> 
                                </td>

                            </tr>

                        </table>     

                        <div class="file-upload">
                            <input type="file" class="file-input" name="file" required>
                        </div>

                        <div class="submit">
                            <button name="submit"> SUBMIT </button>
                        </div>

                    </div>

                </form>

            </div>
            
        </div>
    </div>

</body>
</html>