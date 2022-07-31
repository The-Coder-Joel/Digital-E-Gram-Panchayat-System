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
        $dod = $_POST['dod'];
        $gender = $_POST['gender'];
        $deceased_name = $_POST['death'];
        $status = " Pending... ";

        $query = "INSERT INTO death_certificate (applicant,district, local_body_type,local_body,date_of_death,gender,name_of_deceased,status) VALUES ('$applicant','$district','$localbodytype','$localbody','$dod','$gender','$deceased_name','$status')";       
        $result = mysqli_query($connect,$query);

        if($result){

            header("location:../alerts/application.html");

        }
        else{

            header("location:../alerts/errors.html");

        }

    }
    
?>