<?php
$url="https://tradesatoshi.com/api/public/getmarketsummaries";
$get=file_get_contents($url);
$json=json_decode($get);


//echo "<pre>";
//print_r($json);
//echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trade Satoshi</title>
  <meta http-equiv="refresh" content="5"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Trade Satoshi</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Pair Coin</th>
        <th>Last Price</th>
        <th>Low Price</th>
        <th>High Price</th>
      </tr>
    </thead>
    <tbody>
<?php
  $no=0;

foreach ($json->result as $data) {
  $no++;
  $pair=$data->market;
  $last=number_format((float)$data->last,9);
  $low=number_format((float)$data->low,9);
  $high=number_format((float)$data->high,9);
  echo "
    <tr>
      <td>$no</td>
      <td>$pair</td>
      <td>$last</td>
      <td class='table-danger'>$low</td>
      <td class='table-success'>$high</td>
    </tr>";
  }
?>
    </tbody>
  </table>
</div>

</body>
</html>
