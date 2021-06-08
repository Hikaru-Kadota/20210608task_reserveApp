<?php

include('functions.php');
$pdo = connect_to_db();



if (
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['email']) || $_POST['email'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$reserve_date = $_POST['reserve_date'];
$reserve_time = $_POST['reserve_time'];

$sql = 'INSERT INTO reserve_table(id, name, email, reserve_date, reserve_time, created_at, updated_at)VALUE(NULL, :name, :email, :reserve_date, :reserve_time, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':reserve_date', $reserve_date, PDO::PARAM_STR);
$stmt->bindValue(':reserve_time', $reserve_time, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:my_reserve.php?id={$name}");
  exit();
}

// var_dump($reserve_date);
// exit();
