<?php

    include("../config/connection.php");

    session_start();

    if(isset($_POST['submit'])){

        $applicant = $_POST['applicant'];
        $email = $_POST['email'];
        $scheme = $_POST['scheme'];
        $status = "Pending";

        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];

        $file = move_uploaded_file($file_tmp,"uploaded-files/".$file_name);

        $query = " INSERT INTO applications (applicant,email,scheme,file_uploaded,status) VALUES ('$applicant','$email','$scheme','$file_name','$status') ";
        $result = mysqli_query($connect,$query);

        if($result){

            header("location:../alerts/application.html");

        }
        else{

            header("location:../alerts/errors.html");

        }

    }
    else{

        echo "<script> alert(' SOMETHING WENT WRONG....! '); </script>";

    }

?>