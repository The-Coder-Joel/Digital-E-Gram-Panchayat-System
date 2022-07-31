<?php

    include("../config/connection.php");

    session_start();

    if(isset($_POST['add'])){

        $sid = $_POST['sid2'];
        $scheme = $_POST['scheme2'];
        $category = $_POST['category2'];
        $elgibility = $_POST['elgibility2'];
        $req_doc = $_POST['req_doc2'];
        $time = $_POST['limit2'];

        $query = " INSERT INTO schemes (s_id,scheme,category,elgibility,req_doc,time_limit) VALUES ('$sid','$scheme','$category','$elgibility','$req_doc','$time') ";
        $result = mysqli_query($connect,$query);

        if($result){

            header("location:../alerts/add.html");

        }
        else{

            header("location:../alerts/add.html");

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

                <form action="scheme-add.php" method="POST">

                    <div class="scheme1">

                        <table>

                            <tr>
                                <td> ID </td>
                                <td> <input type="text" name="sid2" required> </td>
                            </tr>

                            <tr>
                                <td> Scheme </td>
                                <td> <input type="text" name="scheme2" required> </td>
                            </tr>

                            <tr>
                                <td> Category </td>
                                <td> <input type="text" name="category2"  required> </td>
                            </tr>

                            <tr>
                                <td> Eligibility </td>
                                <td>  <input type="text" name="elgibility2"  required> </td>
                            </tr>

                            <tr>
                                <td> Required Document </td>
                                <td> <input type="text" name="req_doc2" required> </td>
                            </tr>

                            <tr>
                                <td> Time Limit </td>
                                <td> <input type="text" name="limit2"  required> </td>
                            </tr>

                        </table>

                        <div class="button">        
                            <button name="add" class="add1"> <i class="fas fa-plus-circle"></i> ADD </button>
                        </div>   

                    </div>

                </form>

            </div>
        </div>
    </div>   
    
</body>
</html>