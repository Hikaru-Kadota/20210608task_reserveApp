<?php

include('functions.php');
$pdo = connect_to_db();

$name = $_GET['id'];

// var_dump($name);
// exit();

$sql = 'SELECT * FROM reserve_table WHERE name = :name ORDER BY reserve_date, reserve_time ASC';

// var_dump($sql);
// exit();

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  // var_dump($result);
  // exit();

  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["reserve_date"]}</td>";
    $output .= "<td>{$record["reserve_time"]}</td>";
    $output .= "<td>
    <a href='delete.php?id={$record["id"]}&name={$record["name"]}'>取り消し</a>
    </td>";
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
  <title>予約一覧（利用者画面）</title>
  <style>
    table {
      margin-top: 20px;
    }

    td {
      padding: 0 20px;
    }
  </style>
</head>

<body>
  <?= $name ?>様の予約一覧
  <div>
    <table>
      <thead>
        <tr>
          <th>予約日</th>
          <th>時間</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </div>
  <a class="btn" href="index.php">予約画面</a>
</body>

</html>