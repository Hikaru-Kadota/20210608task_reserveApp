<?php

include('functions.php');
$pdo = connect_to_db();

$sql = 'SELECT * FROM reserve_table';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <style>
    td {
      padding: 20px 40px;
      border-right: solid 0.1px;
    }

    .part {
      padding: 10px;
    }
  </style>
</head>

<body>
  <h2>何かを予約するサイト</h1>
    <table>
      <tbody>
        <tr>
          <td>
            6月1日
            <table>
              <tbody>
                <tr>
                  <div class="part">
                    <div>10:30~11:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-01">
                      <input type="hidden" name="reserve_time" value="0">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
                <tr>
                  <div class="part">
                    <div>11:30~12:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-01">
                      <input type="hidden" name="reserve_time" value="1">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
                <tr>
                  <div class="part">
                    <div>14:30~15:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-01">
                      <input type="hidden" name="reserve_time" value="2">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
                <tr>
                  <div class="part">
                    <div>15:30~16:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-01">
                      <input type="hidden" name="reserve_time" value="3">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
              </tbody>
            </table>
          </td>
          <td>
            6月２日
            <table>
              <tbody>
                <tr>
                  <div class="part">
                    <div>10:30~11:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-02">
                      <input type="hidden" name="reserve_time" value="0">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
                <tr>
                  <div class="part">
                    <div>11:30~12:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-02">
                      <input type="hidden" name="reserve_time" value="1">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
                <tr>
                  <div class="part">
                    <div>14:30~15:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-02">
                      <input type="hidden" name="reserve_time" value="2">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
                <tr>
                  <div class="part">
                    <div>15:30~16:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-02">
                      <input type="hidden" name="reserve_time" value="3">
                      <button>予約</button>
                    </form>
                </tr>
              </tbody>
            </table>
          </td>
          <td>
            6月３日
            <table>
              <tbody>
                <tr>
                  <div class="part">
                    <div>10:30~11:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-03">
                      <input type="hidden" name="reserve_time" value="0">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
                <tr>
                  <div class="part">
                    <div>11:30~12:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-03">
                      <input type="hidden" name="reserve_time" value="1">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
                <tr>
                  <div class="part">
                    <div>14:30~15:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-03">
                      <input type="hidden" name="reserve_time" value="2">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
                <tr>
                  <div class="part">
                    <div>15:30~16:30</div>
                    <form action="reserveform.php" method="POST">
                      <input type="hidden" name="reserve_date" value="2021-06-03">
                      <input type="hidden" name="reserve_time" value="3">
                      <button>予約</button>
                    </form>
                  </div>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <a href="read.php">(予約一覧)管理者用</a>

</body>

</html>