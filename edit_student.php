<?php
include_once 'connection.php';

if (isset($_GET['id'])) {
  $studentID = $_GET['id'];
  $select = $pdo->prepare("SELECT * FROM cryde_studentlist WHERE id = ?");
  $select->execute([$studentID]);
  $student = $select->fetch(PDO::FETCH_OBJ);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnsave'])) {
  $studentName = $_POST['student_name'];
  $studentPhone = $_POST['student_phone'];
  $studentEmail = $_POST['student_email'];
  $studentGender = $_POST['student_gender'];

  $update = $pdo->prepare("UPDATE cryde_studentlist SET student_name = ?, student_phone = ?, student_email = ?, student_gender = ? WHERE id = ?");
  $update->execute([$studentName, $studentPhone, $studentEmail, $studentGender, $studentID]);

  header('Location: student_list.php');
  exit;
}
?>

<!doctype html>
<html lang="en">
<head>
  <title>
    <head>
  </title>
<style>
  body {

  background: #335eff;
     text-align: center;
      
  }
  .submit {
    background-color:green;
    align-items: center;
     }
    h1 {
       text-align: center;
         background-color:white; 
       font size:50px ;
       margin: 100px;
        }
       .form{
        margin:100px;
        /* padding:  */
       }
</style>

<body>

  <h1>Edit_student</h1>
<div class="row">
<div class="col-md8">
  <form method="POST" style= background-color:white;>
  <div class="form-group">
     <div class="row">
       <div class="col-md-4">
    <label>Student Name:</label>
    <input type="text" name="student_name" value="<?php echo $student->student_name ?>" class="form-control" placeholder="Enter student name">
  

  <div class="form-group">
    <label>Student Phone:</label>
    <input type="number" name="student_phone" value="<?php echo $student->student_phone ?>" class="form-control" placeholder="Enter student phone">
  </div>

  <div class="form-group">
    <label>Student Email:</label>
    <input type="email" name="student_email" value="<?php echo $student->student_email ?>" class="form-control" placeholder="Enter student email">
  </div>

  <div class="form-group">
    <label>Student Gender:</label>
    <select name="student_gender" class="form-control">
      <option disabled selected value="">Select Gender</option>
      <option value="Male" <?php if ($student->student_gender == 'Male') echo 'selected'; ?>>Male</option>
      <option value="Female" <?php if ($student->student_gender == 'Female') echo 'selected'; ?>>Female</option>
    </select>
  </div>
  <div    class="text-center" margin="12px" >
             <button type="submit" name="btnsave" class="btn btn-success">Save info</button>
      </div>
</div>

</div>
  </div>
  </div>
</form>
</body>
</html>
