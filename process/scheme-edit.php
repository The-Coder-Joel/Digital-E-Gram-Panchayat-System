<?php

    include("../config/connection.php");

    if(isset($_GET['sid'])){

        $scheme_id = $_GET['sid'];

        if(isset($_POST['edit'])){

            $sid = $_POST['sid3'];
            $scheme = $_POST['scheme3'];
            $category = $_POST['category3'];
            $elgibility = $_POST['elgibility3'];
            $req_doc = $_POST['req_doc3'];
            $time = $_POST['limit3'];

            $query = " UPDATE schemes SET s_id = '$sid',scheme = '$scheme',category = '$category',elgibility = '$elgibility',req_doc = '$req_doc',time_limit = '$time' WHERE s_id = '$scheme_id'";
            $result = mysqli_query($connect,$query);

            if($result){

                header("location: ../alerts/edit.html");

            }
            else{
                
                header("location: ../alerts/errors.html");

            }
        }
    }


?>