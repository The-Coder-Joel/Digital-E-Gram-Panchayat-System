<?php

    include("../config/connection.php");

    if(isset($_GET['app_id'])){

        $app_id = $_GET['app_id'];

        if(isset($_POST['ok'])){

            $application_id = $_POST['application_id'];
            $status = $_POST['status'];

            $query = " UPDATE applications SET application_id = '$application_id' , status = '$status' WHERE app_id = '$app_id' ";
            $result = mysqli_query($connect,$query);

            if($result){
                header("location:view-schemes.php");
            }
            else{
                echo "ERROR";
            }

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Scheme Applications </title>
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

    </style>
    
</head>
<body>

    <div class="left-container">
        <div class="right-container">

            <div class="filter">

                <h2 style=" text-align:center; margin-bottom:20px; color:#4a4a4a;"> SCHEME'S </h2>

                <table>

                    <tr>
                        <th>Application ID</th>
                        <th>Applicant</th>
                        <th>E-Mail</th>
                        <th>Scheme</th>
                        <th>File Uploaded</th>
                        <th> Application Status </th>
                        
                    </tr>

                    <?php

                        $query = "SELECT * FROM applications";
                        $result = mysqli_query($connect,$query);

                        if(mysqli_num_rows($result) > 0){

                            while($row = mysqli_fetch_array($result)){

                    ?>

                    <tr>

                        <form action="view-schemes.php?app_id=<?php echo $row[0];?>" method="post">

                            <td> 
                                <input type="text" class="id" name="application_id" value="<?php echo $row[1]; ?>">                                   
                            </td>
                            
                            <td> <?php echo $row[2]; ?> </td>
                            <td> <?php echo $row[3]; ?> </td>
                            <td> <?php echo $row[4]; ?> </td>
                            <td> <a href="../uploads/file-view.php?view_id=<?php echo $row[0]; ?>"> <?php echo $row[5]; ?> </a></td>

                            <td>

                                <h3 style="color: red;"> <?php echo $row[6];?> </h3>

                                <select name="status" class="status">
                                    <option value="Pending...">Pending...</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Approved">Approved</option>
                                </select>

                                <button name="ok" class="ok"> OK </button>

                            </td>

                        </form>

                    </tr>

                    <?php

                            }
                        }

                    ?>

                </table>

            </div>

        </div>
    </div>   
    
</body>
</html>