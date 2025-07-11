<?php
session_start();

if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}



include_once 'connection.php';

include_once 'navbar_student.php';


if (!isset($_SESSION['email']) || empty($_SESSION['email']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'user');
    // Haddii aanu shuruuduhu buuxin, u dir bogga login-k
 


//  Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnsave'])) {
 
    $userName = $_POST['username'];
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $userRole = $_POST['role'];

$check = $pdo->prepare("SELECT * FROM tbl_users WHERE email = ?");
$check->execute([$userEmail]);
$existingUser = $check->fetch(PDO::FETCH_ASSOC);

if ($existingUser) {
    // Email jira, hadda hubi password-kii hore
    if (password_verify($_POST['password'], $existingUser['password'])) {
        // Password-ka waa sax, sii wad
        echo "<script>alert('Email already exists, but password is correct. Proceeding...');</script>";
        header("location:users.php");
    } else {
        // Password-ka waa khaldan
        echo "<script>alert('Email already exists, but password is incorrect!');</script>";
    }
} else {
    // Email ma jiro, markaa keydi user cusub
    $insert = $pdo->prepare("INSERT INTO tbl_users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $insert->execute([$userName, $userEmail, $userPassword, $userRole]);
    echo "<script>alert('User successfully saved!');</script>";
}

}

    
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>
<style>
    .body{
        
    }
h2{
    background: #335eff;
    color:white;
    margin:-60px;
    padding: -20px;
}
.container{
    background: ;
      background:#33e6f ;
   

}

</style>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4" >User List</h2>
    <div class="row">
        <!-- FORM SECTION -->
        <div class="col-md-4">
            <form action="" method="post">
                <div class="mb-3">
                    <b>
                    <label class="form-label">Username:</label>
                    <input type="text" name="username" class="form-control" required placeholder="Enter username">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required placeholder="Enter Email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" required placeholder="Enter password">
                      </b>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role:</label>
                    <select name="role" class="form-control" required>
                        <option value="" disabled selected>Choose role</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" name="btnsave" class="btn btn-success w-100">Save Info</button>
                </div>
            </form>
        </div>

        <!-- USER TABLE SECTION -->
        <div class="col-md-8">
            <table class="table table-bordered table-striped">
                <thead class="burlywood">
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Update</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <?php
                    $select = $pdo->prepare("SELECT * FROM tbl_users ORDER BY id DESC");
                    $select->execute();
                    $users = $select->fetchAll(PDO::FETCH_OBJ);
                    foreach ($users as $item) {
                        echo "<tr>
                                <td>{$item->id}</td>
                                <td>" . htmlspecialchars($item->username) . "</td>
                                <td>" . htmlspecialchars($item->email) . "</td>
                                <td>" . htmlspecialchars($item->password) . "</td>
                                <td>" . htmlspecialchars($item->role) . "</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
