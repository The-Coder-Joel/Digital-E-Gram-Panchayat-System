<?php 

    include("../config/connection.php");

    if(isset($_GET['dc_id'])){

        $dc_id = $_GET['dc_id'];

        if(isset($_POST['ok'])){

            $application_id = $_POST['application_id'];
            $status = $_POST['status'];

            $query = " UPDATE death_certificate SET application_id = '$application_id' , status = '$status' WHERE dc_id = '$dc_id' ";
            $result = mysqli_query($connect,$query);

            if($result){
                header("location:view-death.php");
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
    <title> Death Certificate Applications </title>
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

                <h2 style=" text-align:center; margin-bottom:20px; color:#4a4a4a;"> DEATH CERTIFICATE </h2>

                <table>

                    <tr>
                        <th>Application ID</th>
                        <th>Applicant</th>
                        <th>District</th>
                        <th>LocalBodyType</th>
                        <th>LocalBody</th>
                        <th>Date of Death</th>
                        <th>Gender</th>
                        <th>Name of Deceased</th>
                        <th>Application Status</th>
                    </tr>

                    <?php

                        $query = "SELECT * FROM death_certificate";
                        $result = mysqli_query($connect,$query);

                        if(mysqli_num_rows($result) > 0){

                            while($row = mysqli_fetch_array($result)){

                    ?>

                    <tr>

                        <form action="view-death.php?dc_id=<?php echo $row[0];?>" method="post">

                            <td>
                                <input type="text" class="id" name="application_id" value="<?php echo $row[1]; ?>">    
                            </td>

                            <td> <?php echo $row[2]; ?> </td>
                            <td> <?php echo $row[3]; ?> </td>
                            <td> <?php echo $row[4]; ?> </td>
                            <td> <?php echo $row[5]; ?> </td>
                            <td> <?php echo $row[6]; ?> </td>
                            <td> <?php echo $row[7]; ?> </td>
                            <td> <?php echo $row[8]; ?> </td>

                            <td>

                                <h3 style="color: red;"><?php echo $row[9];?></h3>

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