<?php

include_once("db_config.php");
include("db_connect.php");
session_start();

if(isset($_POST['submit'])){
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $amt = $_POST['amt'];
    $numberppl = $_POST['ppl'];
    $address = $_POST['address'];
    $mobile = $_POST['phn'];
    // $image = $_POST['image'];
   
    // $ori_filename = $_FILES["image"]["name"];
    // if(isset($_FILES['image_file']["name"]))
    // {
        $conn = new Mysqli(HOST,USER,PASS,DB);
        $pre_stmt = $conn->prepare("INSERT INTO `donor`(`Name`, `PNO`, `Email`, `AmtFood`,`Address`, `NoofPeps`, `status`) VALUES (?,?,?,?,?,?,'1')");  
        $pre_stmt->bind_param("ssssss",$name,$mobile,$email,$amt,$address,$numberppl);
        $result = $pre_stmt->execute() or die($conn->error);
        $result = $pre_stmt->get_result();
        if($result > 0){
            echo "<script type='text/javascript'>alert('DATA NOT ENTERED')</script>";
        }else{ 
            ?>
            <script>
                alert("Insertion Successful.. :)");
                window.location.href = "donor_home.html";
            </script>
            <?php
        }
    // }
}

  
?>