<?php

// error_reporting(E_ALL);
// include("action.php");
include_once("db_config.php");
include("db_connect.php");
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type= $_POST['user_type'];
    $_SESSION["email"] = $email; 
    // die();

    $conn = new Mysqli(HOST,USER,PASS,DB);
 
    $sql = "SELECT * FROM `user_details` WHERE email_id='$email' and password='$password' and user_type='$user_type' ";
    $query_con = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query_con) > 0){ 
            if($user_type == 'NGO') {
                header("Location:NGOindex.html");
                $_SESSION["email"] = $email; 
                
            }else if($user_type == 'DONOR'){
                header("Location:donor_home.html");
                $_SESSION["email"] = $email;
            }else{
                ?>
                <script type = "text/javascript">
                    alert("Please check your credentials");
                    window.location.href = "login.html";
                </script>
                <?php
            }
        }else{
            ?>
            <script type = "text/javascript">
                 alert("Please check your credentials");
                    window.location.href = "login.html";
            </script>
            <?php
        }
}
    
?>