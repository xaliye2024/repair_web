<?php
include_once("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Xaliye Repair | Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Segoe UI', sans-serif;
    }

    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('repair.webp') no-repeat center center/cover;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: white;
      animation: fadeIn 1.2s ease-in-out;
    }

    h1 {
      font-size: 3.5em;
      margin-bottom: 20px;
      letter-spacing: 1px;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
    }

    p {
      font-size: 1.3em;
      max-width: 650px;
      margin-bottom: 25px;
      color: #f1f1f1;
    }

    a {
      background: #00b894;
      color: white;
      padding: 14px 30px;
      border-radius: 50px;
      font-weight: bold;
      text-decoration: none;
      box-shadow: 0 5px 15px rgba(0, 184, 148, 0.4);
      transition: 0.3s ease;
    }

    a:hover {
      background: #019875;
      box-shadow: 0 5px 25px rgba(0, 184, 148, 0.6);
      transform: scale(1.05);
    }

    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 2.2em;
      }
      p {
        font-size: 1em;
        padding: 0 20px;
      }
    }
  </style>
</head>
<body>
  <div class="hero">
    <h1>Welcome to Xaliye Tech Repair</h1>
    <p>We repair mobile phones and computers fast, professionally, and affordably. Your device is in safe hands with us.</p>
    <a href="index.php">Submit Repair Request</a>
  </div>
</body>
</html>
