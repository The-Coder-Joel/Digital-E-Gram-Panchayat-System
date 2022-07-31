<?php

    include("../config/connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <link rel="stylesheet" href="../css/table.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
        /*.icon{
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
        }*/
        table tr td{
            padding: 20px;
        }

    </style>

</head>
<body> 

    <!--- <a class="icon" href="../admin/index.php"><i class="fas fa-chevron-circle-left"></i> Back </a> --->

    <div class="left-container">
        <div class="right-container">
            <div class="filter">

                <h2 style=" text-align:center; margin-bottom:20px; color:#4a4a4a;"> FEEDBACKS </h2>

                <table>

                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>E-Mail</th>
                        <th>Mobile</th>
                        <th>Feedbacks</th>
                    </tr>

                    <?php

                        $query = "SELECT * FROM feedback";
                        $result = mysqli_query($connect,$query);

                        if(mysqli_num_rows($result) > 0){

                            while($row = mysqli_fetch_assoc($result)){

                    ?>

                    <tr>
                        <td style="padding: 10px;"> <?php echo $row['f_name']; ?> </td>
                        <td> <?php echo $row['l_name']; ?> </td>
                        <td> <?php echo $row['email']; ?> </td>
                        <td> <?php echo $row['mobile']; ?> </td>
                        <td> <?php echo $row['message']; ?> </td>
                    </tr>
                        
                    <?php

                            }

                        }
                        else{

                            echo "<script> alert(' SOMETHING WENT WRONG....! '); </script>";
                
                        }

                    ?>

                </table>

            </div>
        </div>
    </div>
    
</body>
</html>