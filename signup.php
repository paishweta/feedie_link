<?php
include("db_config.php");
include("db_connect.php");


    if(isset($_POST['submit'])){
        $fname = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $number = $_POST['mobile'];
        $address = $_POST['address'];
        $user_identity = $_POST['user_identity'];
        $usertype = $_POST['user_type'];
       

        $conn = new Mysqli(HOST,USER,PASS,DB);
        $pre_stmt = $conn->prepare("INSERT INTO `user_details`(`username`, `email_id`, `password`, `mobile`, `address`, `user_identity`, `user_type`) VALUES (?,?,?,?,?,?,?)");  
        $pre_stmt->bind_param("sssssss",$fname,$email,$password,$number,$address,$user_identity,$usertype);
        $result = $pre_stmt->execute() or die($conn->error);
        $result = $pre_stmt->get_result();
        if($result > 0){
            echo "<script type='text/javascript'>alert('DATA NOT ENTERED')</script>";
        }else{ 
            ?>
            <script>
                alert("Registration Successful.. :)");
                window.location.href = "login.html";
            </script>
            <?php
        }
    }

    
?>
