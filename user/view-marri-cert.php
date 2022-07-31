<?php

    include("../config/connection.php");

    if(isset($_GET['view_id'])){

        $view_id = $_GET['view_id'];
    
        $query = " SELECT * FROM marriage_certificate WHERE mc_id = '$view_id' ";
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
    <title>Marriage Certificate</title>
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

                    <h2 class="head" style="font-size: 26px;"> MARRIAGE CERTIFICATE </h2>
            
                    <p> This Certifies that <br></p>

                    <div style="width: 100%; text-align:center; margin-top:40px;"> 

                        <h6 style="font-size: 23px;float:left;margin-left:10px;border-bottom:2px dotted #222;font-size: 23px;font-weight: 400;width:200px;"> <?php echo $row[7]; ?> </h6> 
                        <p class="p1" style="border: none; margin-top: 5px;font-size: 24px;font-weight: 600;margin-left:30px;"> And </p> 
                        <h6 style="width:200px;font-size: 23px;float:right;margin-top: -28px;margin-right:10px;border-bottom:2px dotted #222;font-size: 23px;font-weight: 400;"> <?php echo $row[8]; ?> </h6>

                    </div>

                    <P> Were United in the Holy Bond of Matrimony <br></P>
                    <p style="margin-top: 20px;"> On <br></p> 
                    <p class="p1" style="margin-top: 20px;"> <?php echo $row[6]; ?><br></p>

                    <p style="margin-top: 20px;"> At <br></p> 

                    <p class="p1" style="margin-top: 20px;">

                        <?php  

                            echo $row[5]; 
                            echo ', ';
                            echo $row[3]; 

                        ?> 
                        
                    </p>

                    <p class="p2" style="margin-top: 120px;"> Witnessed By </p> 
                    <p class="p3" style="margin-top: 120px;"> Officiated By </p>

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