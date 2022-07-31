<?php

    include("../config/connection.php");

    if(isset($_GET['scheme_id'])){

        $scheme_id = $_GET['scheme_id'];

        $query = " SELECT * FROM schemes WHERE s_id = $scheme_id ";
        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result);

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

    <a class="icon" href="../admin/edit.php"><i class="fas fa-chevron-circle-left"></i> Back </a>
    
    <div class="left-container">
        <div class="right-container">
            <div class="content">

                <form action="../process/scheme-edit.php?sid=<?php echo $row[0]; ?>" method="POST">

                    <div class="scheme1">

                        <table>

                            <tr>
                                <td> ID </td>
                                <td> <input type="text" name="sid3" value="<?php echo $row[0]; ?>"> </td>
                            </tr>

                            <tr>
                                <td> Scheme </td>
                                <td> <input type="text" name="scheme3" value="<?php echo $row[1]; ?>"> </td>
                            </tr>

                            <tr>
                                <td> Category </td>
                                <td> <input type="text" name="category3" value="<?php echo $row[2]; ?>"> </td>
                            </tr>

                            <tr>
                                <td> Eligibility </td>
                                <td>  <input type="text" name="elgibility3" value="<?php echo $row[3]; ?>"> </td>
                            </tr>

                            <tr>
                                <td> Required Document </td>
                                <td> <input type="text" name="req_doc3" value="<?php echo $row[4]; ?>"> </td>
                            </tr>

                            <tr>
                                <td> Time Limit </td>
                                <td> <input type="text" name="limit3" value="<?php echo $row[5]; ?>"> </td>
                            </tr>

                        </table>

                        <div class="button">        
                            <button name="edit" class="add1"> <i class="fas fa-edit"></i> EDIT </button>
                        </div>   

                    </div>

                </form>
                
            </div>
        </div>
    </div>

</body>
</html>