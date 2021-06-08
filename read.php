<?php

include('functions.php');
$pdo = connect_to_db();

$sql = 'SELECT * FROM reserve_table ORDER BY reserve_date, reserve_time ASC';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// var_dump($status);
// exit();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";

  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["name"]}</td>";
    $output .= "<td>{$record["email"]}</td>";
    $output .= "<td>{$record["reserve_date"]}</td>";
    $output .= "<td>{$record["reserve_time"]}</td>";
    $output .= "</tr>";
  }
  // $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($record);
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約一覧(運営者用)</title>
  <style>
    table {
      padding-top: 20px;
    }

    td {
      padding: 0 20px;
      border-bottom: solid 0.1px;
    }
  </style>
</head>

<body>
  予約一覧（管理者用）
  <table>
    <tbody>
      <tr>
        <th>お名前</th>
        <th>連絡先</th>
        <th>予約日</th>
        <th>予約時間</th>
      </tr>
      <?= $output ?>
    </tbody>
  </table>
  <a href="index.php">予約画面</a>
</body>

</html>