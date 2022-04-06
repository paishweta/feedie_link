<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FEEDIE - Feed Just One</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
    <!-- Data Table Links -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> 
      <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <!-- Data Table Links -->

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v4.7.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="NGOindex.html"><span><img src="assets/img/favicon.png" alt="" >FEEDIE</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="NGOindex.html">Home</a></li>
            <li><a class="nav-link scrollto" href="#">Donor Details</a></li>
            <li><a class="nav-link scrollto" href="rating.php">Ratings</a></li>      
            <li><a class="nav-link scrollto" href="#">Analytics</a></li> 
            <!-- <li><a class="nav-link scrollto" href="#">Logout</a></li> -->
            <li><a class="getstarted scrollto" href="#">My Profile</a></li>
          </ul>

          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>We Care for People.</h1>
      <h2>If you can't feed a hundred people. Then Feed just One.</h2>
      <a href="login.html" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  
<div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" ><u>Donor Details</u></h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 <tr class="bg-light text-white text-center">
   <th> Name </th>
   <th>PhoneNumber</th>
   <th>Email</th>
   <th>Amount of Food</th>
   <th>Message</th>
   <th>No of People</th>
   <th>Status</th>
 </tr >
  <?php
        $con =mysqli_connect('localhost' , 'root', '', 'feedie');
        $q="SELECT `donor_id`, `Name`, `PNO`, `Email`, `AmtFood`, `Address`, `NoofPeps` FROM `donor`";
        $query = mysqli_query($con,$q);
        while($res = mysqli_fetch_array($query)){
          foreach($query as $row){        
  ?>
        <tr class="text-center">
          <td><?php   echo $row['Name'];?></td>
          <td><?php   echo $row['PNO'];  ?></td>
          <td class="email"><?php echo $row['Email'];  ?></td>
          <td><?php   echo $row['AmtFood'];  ?></td>
          <td><?php   echo $row['Address'];  ?></td>
          <td><?php   echo $row['NoofPeps'];  ?></td>
          <td class="emp_id">
            <button class='btn btn-primary btn-sm accept' name="accept" id= "<?php echo $row['donor_id'];?>" >Accept</button>
            <button class='btn btn-danger btn-sm reject' name="reject" id="<?php echo $row['donor_id']; ?>" >Reject</button>
          </td>
        </tr>
    <?php
        }
      }
    ?>
    </table>
  </div>
</div>


    <script type="text/javascript">
    
    $(document).ready( function () {
      $('#tabledata').DataTable();
    });

    $(document).on("click",".accept",function(){
       var id = this.id;
       var email = $(".email").text();
      //  alert(email);

      $.ajax({
        type: "POST",
        url: "update.php",
        data: {
          'checking_acceptbtn':true,
          'id': id,
          'email':email,
        },
        success: function (response) {
          console.log(response);
          // alert("Update Sucessful");
        }
      });
    });

    $(document).on("click",".reject",function(){
       var id = this.id;
      //  alert(id);

      $.ajax({
        type: "POST",
        url: "update.php",
        data: {
          'checking_rejectbtn':true,
          'id': id,
        },
        success: function (response) {
          // console.log(response);
          alert("Update Sucessful");
        }
      });
    });

    </script>
  


</body>
</html>
  
 
  