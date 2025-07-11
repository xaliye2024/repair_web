<?php
include_once 'connection.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $select = $pdo->prepare("Delete * FROM cryde_studentlist WHERE id = ?");

}
  $delete = $pdo->prepare("DELETE FROM cryde_studentlist WHERE id = ?");{
  $delete->execute([$id]);
header('Location: student_list.php');
  exit;
}
?>
