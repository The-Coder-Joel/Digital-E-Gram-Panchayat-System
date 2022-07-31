<?php

    include("../config/connection.php");

    session_start();

    $id = $_SESSION['id'];

    $query = " SELECT * FROM users WHERE u_id = '$id' ";
    $result = mysqli_query($connect,$query);

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $username = $row[1];

        }
    
    }

    if(isset($_POST['submit'])){

        $applicant = $username;
        $district = $_POST['district'];
        $localbodytype = $_POST['localbodytype'];
        $localbody = $_POST['localbody'];
        $dom = $_POST['dom'];
        $hus_name = $_POST['hus'];
        $wife_name = $_POST['wife'];
        $status = " Pending... ";

        $query = "INSERT INTO marriage_certificate (applicant,district, local_body_type,local_body,date_of_marriage,husband_name,wife_name,status) VALUES ('$applicant','$district','$localbodytype','$localbody','$dom','$hus_name','$wife_name','$status')";        
        $result = mysqli_query($connect,$query);

        if($result){

            header("location:../alerts/application.html");
            
        }
        else{

            header("location:../alerts/errors.html");

        }

    }
    
?>