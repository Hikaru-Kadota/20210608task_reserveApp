<?php
include('functions.php');
$pdo = connect_to_db();

// var_dump($_GET);
// exit();

$id = $_GET['id'];
$name = $_GET['name'];

// var_dump($id);
// var_dump($name);
// exit();

$sql = "DELETE FROM reserve_table WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常に実行された場合は一覧ページファイルに移動し，処理を実行する
  // var_dump($name);
  // exit();
  header("Location:my_reserve.php?id=$name");

  exit();
}
