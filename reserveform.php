<?php

include('functions.php');
$pdo = connect_to_db();

$reserve_date = $_POST['reserve_date'];
$reserve_time = $_POST['reserve_time'];




// var_dump($reserve_date);
// exit();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約フォーム</title>
</head>

<body>

  <h2>予約フォーム</h2>
  <form action="create.php" method="POST">
    <table>
      <tbody>
        <tr>
          <td>ご希望日</td>
          <td id='choice_reserve_date'></td>
          <input type="hidden" name="reserve_date" id="reserve_date">
        </tr>
        <tr>
          <td>ご希望時間</td>
          <td id='choice_reserve_time'></td>
          <input type="hidden" name="reserve_time" id="reserve_time">
        </tr>
        <tr>
          <td>お名前</td>
          <td><input type="text" name="name"></td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td><input type="text" name="email"></td>
        </tr>
      </tbody>
    </table>
    <button>送信</button>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    const reserve_date = <?= json_encode($reserve_date) ?>;
    console.log(reserve_date);
    const reverse_date_single = reserve_date.split('-');
    $('#choice_reserve_date').text(reverse_date_single[0] + "年" + reverse_date_single[1] + "月" + reverse_date_single[2] + "日");
    document.getElementById("reserve_date").value = reserve_date;

    const reserve_time = <?= json_encode($reserve_time) ?>;
    const time_table = [{
        number: '0',
        time_zone: '10:30 ~ 11:30'
      }, {
        number: '1',
        time_zone: '11:30 ~ 12:30'
      },
      {
        number: '2',
        time_zone: '14:30 ~ 15:30'
      },
      {
        number: '3',
        time_zone: '15:30 ~ 16:30'
      }
    ];
    const reserve_time_single = time_table.filter(item => item.number === reserve_time);
    $('#choice_reserve_time').text(reserve_time_single[0].time_zone);
    document.getElementById("reserve_time").value = reserve_time_single[0].time_zone;
  </script>

</body>

</html>