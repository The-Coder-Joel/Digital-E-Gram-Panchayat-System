<?php

    include("../config/connection.php");

    if(isset($_GET['scheme_id'])){

        $scheme_id = $_GET['scheme_id'];

        $query = " DELETE FROM schemes WHERE s_id = $scheme_id ";
        $result = mysqli_query($connect,$query);

        if($result){

            header("location:../alerts/delete.html");

        }
        else{

            header("location:../alerts/errors.html");
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schemes</title>
    <link rel="stylesheet" href="../css/edit.css">
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

    <a class="icon" href="../admin/index.php"><i class="fas fa-chevron-circle-left"></i> Back </a>

    <div class="left-container">
        <div class="right-container">
            <div class="content">

                <?php

                    $query = "SELECT * FROM schemes";
                    $result = mysqli_query($connect,$query);

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){
  
                ?>

                <div class="scheme1">

                    <table>

                        <tr>
                            <td> ID </td>
                            <td> <?php echo $row['s_id']; ?> </td>
                        </tr>

                        <tr>
                            <td> Scheme </td>
                            <td>  <?php echo $row['scheme']; ?> </td>
                        </tr>

                        <tr>
                            <td> Category </td>
                            <td>  <?php echo $row['category']; ?> </td>
                        </tr>

                        <tr>
                            <td> Eligibility </td>
                            <td>  <?php echo $row['elgibility']; ?> </td>
                        </tr>

                        <tr>
                            <td> Required Document </td>
                            <td>  <?php echo $row['req_doc']; ?> </td>
                        </tr>

                        <tr>
                            <td> Time Limit </td>
                            <td>  <?php echo $row['time_limit']; ?> </td>
                        </tr>
                        
                    </table>

                    <div class="button">

                        <a href="../admin/scheme-edit.php?scheme_id=<?php echo $row['s_id'];?>">
                            <button name="edit"><i class="fas fa-edit"></i> EDIT </button>
                        </a>

                        <a href="../admin/edit.php?scheme_id=<?php echo $row['s_id']; ?>">
                            <button name="delete"> <i class="fas fa-trash-alt"></i>  DELETE </button>
                        </a> 

                    </div>  

                </div>

                <?php

                        }
                    }

                ?> 

                <div class="add-scheme">

                    <a href="../admin/scheme-add.php">
                        <button name="add" class="add"> <i class="fas fa-plus-circle"></i> ADD SCHEME </button>
                    </a>

                </div>

            </div>
        </div>
    </div> 

</body>
</html>