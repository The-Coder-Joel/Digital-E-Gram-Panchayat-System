<?php

    include("../config/connection.php");

    if(isset($_GET['view_id'])){

        $view_id = $_GET['view_id'];
    
        $query = " SELECT * FROM death_certificate WHERE dc_id = '$view_id' ";
        $result = mysqli_query($connect,$query);

        if(mysqli_num_fields($result) > 0){

            $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Death Certificate</title>
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

    <a class="icon" href="../user/view.php"><i class="fas fa-chevron-circle-left"></i> Back </a>

    <div class="left-container">
        <div class="right-container">

            <div class="page">

                <div class="certificate">

                    <h2 class="head" style="font-size: 27px;"> CERTIFICATE OF DEATH </h2>
            
                    <p> This is to acknowledge the death of  <br></p>
                    <p class="p1"> <?php echo $row[8]; ?> <br></p>
                    <P> On <br></P>
                    <p class="p1">  <?php echo $row[6]; ?> <br></p> 
                    <p> At <br></p> 
                    <p class="p1">

                        <?php  

                            echo $row[5]; 
                            echo ', ';
                            echo $row[3]; 

                        ?> 
                        
                    </p>

                    <p class="p2"> Doctor on duty </p> 
                    <p class="p3"> Medical Officer </p>

                </div>

            </div>

        </div>
    </div>

</body>
</html>

<?php

        }
        
    }

?>