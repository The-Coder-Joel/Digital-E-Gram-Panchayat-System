<?php

    include("../config/connection.php");

    if(isset($_GET['view_id'])){

        $view_id = $_GET['view_id'];

        $query = " SELECT file_uploaded FROM applications WHERE app_id = $view_id ";
        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_assoc($result);

        }
        else{

            echo "<script> alert(' SOMETHING WENT WRONG....! '); </script>";

        }

    }
    else{

        echo "<script> alert(' SOMETHING WENT WRONG....! '); </script>";

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="../css/table.css">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            overflow: hidden;
        }
        .left-container{
            margin-top: 0;
        }
        .filter{
            overflow: hidden;
            width: 800px;
            margin-left: 340px;
            margin-top: 70px;
        }
        .image{
            width: 90%;
            height: 450px;
            margin-left: 35px;
            margin-top: 35px;
            padding-top: 45px;
            padding-left: 40px;  
        }
        img{
            height: 350px;
            width: 550px;
            padding: 10px;
        }

    </style>
    
</head>
<body>

    <div class="left-container">
        <div class="right-container">

            <div class="filter">

                <div class="image">

                    <img src="uploaded-files/<?php echo $row['file_uploaded'];?>">

                </div>

            </div>

        </div>
    </div>

</body>
</html>