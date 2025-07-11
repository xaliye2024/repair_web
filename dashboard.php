
<?php
session_start();
include_once 'connection.php';



if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}





include_once 'navbar_student.php';
$select = $pdo->prepare("select count(*) FROM cryde_studentlist");
$select->execute();
$students = $select->fetchColumn();

    $select = $pdo->prepare("select count(*) FROM tbl_users");
$select->execute();
$users = $select->fetchColumn();
    

$select = $pdo->prepare("select count(*) FROM cryde_studentlist Where student_gender = 'male'");
$select->execute();
$boys = $select->fetchColumn();
    
$select = $pdo->prepare("select count(*) FROM cryde_studentlist Where student_gender = 'female'");
$select->execute();
$female = $select->fetchColumn();
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>STUDENT LIST</title>

  <style>

    body {
    background;
    position: relative;
    }

    .container {
      top: lift 10px;
      text-align: center;
      top: -12px;
      margin-top: 30px; 
      text 
    }

    h1 {
      text-align: center;
      color: white;
      font-size: 50px;
      background-color: #335eff;
    }

    . button {
      color: green;
    }
   .card-body {
    background-color:black;
   }
  </style>

</head>

<body>
  <h1>Dashboard</h1>
  <div class="container">
    <div class="row">
     <div class="col-md3">

<div class="card tilebox-one">
    <div class="card-body">
        <i class="fas fa-graduation-cap float-end text-muted" style="float: right; font-size: 50px"></i>
        <h6 class="text-muted text-uppercase mt-0"><a href='student_list.php'>Students</h6>
        <h2><?php echo $students ?></h2>
        <span class="badge bg-primary me-2">  </span> <span class="text-muted">welcome crud oparet</span>
    </div>
</div>
<?php 
$userRole = $_SESSION['role']?? null;

if ($userRole === 'Admin'):
?>
  
     </div>
     <div class="col-md3">
        <div class="card tilebox-one">
    <div class="card-body">
        <i class="fas fa-key float-end text-muted" style="float: right; font-size: 50px"></i>
        <h6 class="text-muted text-uppercase mt-0"><a href='users.php'>Total users</h6>
        <h2><?php echo $users?></h2>
        <span class="badge bg-primary me-2"> </span> <span class="text-muted">welcome crud opareti</span>
    </div>
</div>
     </div>
 <?php endif; ?>
     <div class="col-md3">
        <div class="card tilebox-one">
    <div class="card-body">
        <i class="fas solid fa-person float-end text-muted" style="float: right; font-size: 50px"></i>
        <h6 class="text-muted text-uppercase mt-0"><a href='student_list.php'>Boys</h6>
        <h2><?php echo $boys ?></h2>
        <span class="badge bg-primary me-2">  </span> <span class="text-muted">welcome crud opareti</span>
    </div>
</div>
     </div>
     <div class="col-md3">
        <div class="card tilebox-one">
    <div class="card-body">
        <i class="fas solid fa-person-dress float-end text-muted"style="float: right; font-size: 50px"></i>
        <h6 class="text-muted text-uppercase mt-0">Grils</h6>
        <h2><?php echo $female ?></h2>
        <span class="badge bg-primary me-2">  </span> <span class="text-muted">welcome crud opareti</span>
    </div>
</div>
     </div>
          </div>

         
          
      </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>
</html>