<?php
session_start();

include_once 'connection.php';

$error = '';




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_login'])) {

    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    $select = $pdo->prepare("SELECT * FROM tbl_user WHERE email = :email");
    $select->execute(['email' => $userEmail]);
    $user = $select->fetch(PDO::FETCH_ASSOC);

    if ($user && $userPassword === $user['password']) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        // Redirect after successful login
        
        header("Location: dashboard.php");
        exit();
 
    } else {
     $error = "username ama password ayaa qaldan.";
    }

}

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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <title>STUDENT LIST</title>

  <style>

  .gradient-custom {
/* fallback for old browsers */
background: #335eff;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgb(4, 73, 247), rgb(47, 0, 255));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgb(0, 42, 255), rgb(0, 21, 255))
}
  </style>

</head>

<body>
<section class="vh-70 gradient-custom">
  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 3rem;">
          <div class="card-body p-4 text-center">

            <div class="mb-md-4 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>

              <?php if (!empty($error)):?>
                  <div class="alert alert-danger"><?php echo $error; ?></div>
                  <?php endif ?>

              <!-- <p class="text-white-50 mb-5">Please enter your login and password!</p> -->

     <form method="POST" action="">
  <div class="form-outline form-white mb-4">
       <i class="fa-solid fa-user "></i>
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" required />
 
  </div>

  <div class="form-outline form-white mb-4">
      <i class="fa-solid fa-lock"></i>
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" required />
  
  </div>

  <button type="submit" name="btn_login" class="btn btn-outline-light btn-lg px-5">Login</button>

  <!--MUUJI KHALADKA kaliya marka uu jiro -->

  
  
</form>



    

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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