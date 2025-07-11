<?php
include_once("connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $device = $_POST['device'];
  $description = $_POST['description'];
  $photo = $_FILES['photo']['name'];

  $uploadDir = "uploads/";
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
  }

  $target = $uploadDir . basename($photo);

  if (!empty($photo) && move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
    $conn = new mysqli("localhost", "root", "", "repair_web");
    if ($conn->connect_error) {
      die("Connection Failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tbl_repair (name, email, phone, device, description, photo)
            VALUES ('$name', '$email', '$phone', '$device', '$description', '$photo')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('✅ Request Submitted Successfully!');</script>";
    } else {
      echo "❌ Database Error: " . $conn->error;
    }

    $conn->close();
  } else {
    echo "<script>alert('❌ File upload failed. Please try again.');</script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Xaliye Tech Repair</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f4f8;
      min-height: 100vh;
    }

    /* ✅ NAVBAR STYLING */
    .navbar {
      background-color: #0d6efd;
      padding: 15px 30px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .navbar h1 {
      font-size: 20px;
      font-weight: 500;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-size: 14px;
      transition: 0.3s;
    }

    .navbar a:hover {
      text-decoration: underline;
    }

    /* ✅ FORM CONTAINER */
    .container {
      width: 95%;
      max-width: 400px;
      background: #fff;
      padding: 20px 25px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.4s ease-in;
      margin: 40px auto;
    }

    h2 {
      text-align: center;
      margin-bottom: 15px;
      color: #0d6efd;
      font-size: 20px;
    }

    input, textarea, select {
      width: 100%;
      padding: 10px 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    input:focus, textarea:focus, select:focus {
      border-color: #0d6efd;
      outline: none;
      box-shadow: 0 0 5px rgba(13, 110, 253, 0.2);
    }

    button {
      background-color: #0d6efd;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 6px;
      width: 100%;
      font-size: 15px;
      cursor: pointer;
      margin-top: 10px;
    }

    button:hover {
      background-color: #0b5ed7;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(15px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <!-- ✅ NAVBAR -->
  <div class="navbar">
    <h1>Xaliye Repair</h1>
    <div>
      <a href="home.php">Home</a>
      <a href="#">Dashboard</a>
      <a href="#">Contact</a>
    </div>
  </div>

  <!-- ✅ FOOMKA -->
  <div class="container">
    <h2>Repair Request</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="phone" placeholder="Phone Number" required>
      <select name="device" required>
        <option value="">-- Select Device --</option>
        <option value="Mobile">Mobile Phone</option>
        <option value="Computer">Computer</option>
      </select>
      <textarea name="description" placeholder="Describe the issue" rows="3" required></textarea>
      <input type="file" name="photo" accept="image/*">
      <button type="submit">Submit</button>
    </form>
  </div>

</body>
</html>
