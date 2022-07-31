<?php

    include("../config/connection.php");

    if(isset($_POST['submit'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $query = "INSERT INTO feedback (f_name,l_name,email,mobile,message) VALUES ('$fname','$lname','$email','$phone','$message')";

        $result = mysqli_query($connect,$query);

        if($result){

            header("location: ../alerts/feedback.html");

        }
        else{

            header("location: ../alerts/errors.html");
            
        }
    }

?>