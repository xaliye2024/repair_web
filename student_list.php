
<?php
session_start();
include_once 'connection.php';
include_once 'navbar_student.php';


if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnsave'])){


  $studentName = $_POST['student_name'];
   $studentPhone = $_POST['student_phone'];
    $studentEmail = $_POST['student_email'];
     $studentGender = $_POST['student_gender']; 


    

       $insert = $pdo->prepare("INSERT INTO cryde_studentlist (student_name,student_phone,student_email,student_gender)value(?, ?, ? ,?) ");
      $insert->execute([$studentName,$studentPhone,$studentEmail,$studentGender]);
    
    
    }
    
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
      align-items: center;
      margin-top: 40px; 
      background:#33e6ff ;
    }

    h1 {
      text-align: center;
      color: white;
      font-size: 40px;
      background-color: #335eff;
      margin:-10px;
    }

    . body {
      color:white;
      background-color: #335eff;
  
    }
    .table{
         background-color:white;
    }
  </style>

</head>

<body>
  <h1>Student Crud Oparation</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <form method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Student Name:</label>
            <input type="taxt" name="student_name" class="form-control" required placeholder="Enter Student name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Student phone:</label>
            <input type="number" name="student_phone" class="form-control" required placeholder="Enter Student phone ">
          </div>
          <!-- ka bilaabmay qaybta emailka -->
          <div class="form-group">
            <label for="exampleInputPassword1">Email Student:</label>
            <input type="Email" name="student_email" class="form-control" required placeholder="Enter Email student">
          </div>
          <!-- ka bilaabmay qaybta lam ama dhadig -->
          <div class="form-group">
            <label for="exampleInputEmail1">Student Gender:</label>
            <select name="student_gender" class="form-control">
              <option disabled selected value="">Select gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>

          <!-- ka bilaabmay qaybta bottonka -->
          <div class="text-center" margin="12px">
            <button type="submit" name="btnsave" class="btn btn-success w-100 border-radius:2rem ">Save info</button>
          </div>
        </form>
      </div>

      <!-- ka bi;aabmay md 8 qaybta 2aad ee table ka -->
      <div class="col-md-8"style=table color:blue;>
<div class="table">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Student Name</th>
              <th scope="col">Student phone</th>
              <th scope="col">Student Email</th>
              <th scope="col">Gender</th>
              <th scope="col">update</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            </div>
         <?php

$select = $pdo->prepare("SELECT * FROM cryde_studentlist ORDER BY id DESC");
$select->execute();

while ($row = $select->fetch(PDO::FETCH_OBJ)){

echo  '
<tr>
<td>'.$row->id.'</td>
<td>'.$row->student_name.'</td>
<td>'.$row->student_phone.'</td>
<td>'.$row->student_email.'</td>
<td>'.$row->student_gender.'</td>
<td>
<a href="edit_student.php?id=' .$row->id.'" class="btn btn-sm btn-primary" title="Edit" style="size:10px">
 <i class="fa-regular fa-pen-to-square"></i>EDIT
</a>
</td>
<td>
<a href="Delete_student.php?id=' .$row->id.'" class="btn btn-sm btn-danger"onclick="return confirm(\'ma hubtaa in aad ardaygan tirtirto\')" title="Delete">
 <i class="fa-regular fa-trash-can"></i>Delete
</a>
</td>
</tr>
';}

?>

    </tbody>
        </table>
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