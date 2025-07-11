
<?php

include_once 'connection.php';


if (session_status() == PHP_SESSION_NONE){
  session_start();
}

// Xulo magacyada users-ka
$query = $pdo->prepare("SELECT username FROM tbl_user");
$query->execute();

// Soo saar magacyada mid mid
$users = $query->fetchAll(PDO::FETCH_ASSOC);






    
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
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
      top: -12px;
      margin-top: 30px; 
    background:white; }

    h1 {
      text-align: center;
      color: black;
      font-size: 50px;
      background-color:white;
    }

    . button {
      color: green;
    }
  </style>

</head>

<body>
 
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">MY projec</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="student_list.php">STUDENTS </a>
      </li>

         <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>

<?php 
$userRole = $_SESSION['role']?? null;

if ($userRole === 'Admin'):
?>
      <li class="nav-item active">
        <a class="nav-link" href="users.php">Users </a>
      </li>
      <?php endif; ?>
      
      
      <li class="nav-item active">
        <a class="nav-link" href="employee.php">Emplooyee </a>
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="login.php">Log Out </a>
      </li>




    </ul>

    
  </form>
</div>

 <p>hello user
 </p>
  </div>
</nav>
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