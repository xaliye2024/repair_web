<?php

include_once("connection.php");
$conn = new mysqli("localhost", "root", "", "repair_web");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_repair ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Xaliye Admin Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background: #007BFF;
      color: white;
    }
    tr:hover {
      background: #f1f1f1;
    }
    img {
      width: 100px;
    }
  </style>
</head>
<body>
  <h2>Repair Requests</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Device</th>
      <th>Description</th>
      <th>Photo</th>
      <th>Date</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['email']) ?></td>
      <td><?= htmlspecialchars($row['phone']) ?></td>
      <td><?= htmlspecialchars($row['device']) ?></td>
      <td><?= htmlspecialchars($row['description']) ?></td>
      <td>
        <?php if ($row['photo']): ?>
          <img src="uploads/<?= htmlspecialchars($row['photo']) ?>" alt="Photo">
        <?php endif; ?>
      </td>
      <td><?= $row['submitted_at'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
