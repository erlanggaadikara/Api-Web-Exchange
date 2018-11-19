<?php
$url="https://www.tidebit.com//api/v2/tickers";
$get=file_get_contents($url);
$json=json_decode($get);


//echo "<pre>";
//print_r($json);
//echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tidebit</title>
  <meta http-equiv="refresh" content="5"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Tidebit</h2>
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

foreach ($json as $data=>$pair1) {
  $no++;
  $pair=$data;
  $last=number_format((float)$pair1->ticker->last,8);
  $low=number_format((float)$pair1->ticker->low,8);
  $high=number_format((float)$pair1->ticker->high,8);
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
