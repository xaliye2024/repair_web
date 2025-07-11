



<?php
session_start();

include_once 'connection.php';

$error = '';




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_login'])) {

    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    $select = $pdo->prepare("SELECT * FROM tbl_users WHERE email = :email");
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: poppins, sans-serif;
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
background: url(gp.JPg) no-repeat;
background-size: cover;
background-position: center;
display: flex;

}
.wrapper{
    width: 420px;
    color: #fff;
        border-radius: 12px;
    padding: 30px;
border: 2px solid  rgba(255, 255, 255, 0.2);
background: transparent;
backdrop-filter: blur(10px);
    

}
.wrapper h1{
    font-size: 36px;
    text-align: center;


}
.wrapper .input-box{
    position: relative;
width: 100%;
height: 50px;

margin: 30px 0;
}
.input-box input{

    width: 100%;
    height: 100%;
    background:transparent;
    border: none;
    outline: none;
   border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: #fff;
    padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
    color: #fff;
}
.input-box i{
    position: absolute;
    right: 20px;
    top: 30px;
    transform: translate(-50%);
    font-size: 20px;

}
.wrapper .remeper-forget{
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
}
.remeper-forget label input{
    accent-color: #fff;
    margin-right: 3px;
}
.remeper-forget a{
    color: #fff;
    text-decoration: none;

}
.remeper-forget a:hover{
    text-decoration: underline;

}
.wrapper .btn{
    width: 100%;
    height: 35px;
    background: #fff;
    border: none;
    border-radius: 40px;
   box-shadow: 0 0 5px cyan, 0 0 25px cyan;


}
.btn:hover{
   box-shadow: 0 0 5px cyan;

  
}

 


</style>
<body>
 <div class="wrapper">
    <h1>login</h1>

      <?php if (!empty($error)):?>
                  <div class="alert alert-danger"><?php echo $error; ?></div>
                  <?php endif ?>

           <form method="POST" action="">        
    <div class="input-box">
        <input type="email" name="email" placeholder="Email" required>
        <i class="fa-solid fa-user"></i>
    </div>
      <div class="input-box">
        <input type="password"name="password" placeholder="password" required>
       <i class="fa-solid fa-lock"></i>
    </div>
    
     
        <button type="submit" name="btn_login" class="btn">login</button>


</form>

        
        
        </div>
    </div>

 </form>
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