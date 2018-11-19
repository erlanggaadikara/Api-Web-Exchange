<?php
$url="https://v1-1.api.token.store/ticker";
$get=file_get_contents($url);
$json=json_decode($get);


//echo "<pre>";
//print_r($json);
//echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Token Store</title>
  <meta http-equiv="refresh" content="5"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Token Store</h2>
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
foreach ($json as $pair=>$data) {
  $no++;
  $last=number_format((float)$data->last,9);
  echo "
    <tr>
      <td>$no</td>
      <td>$pair</td>
      <td>$last</td>
    </tr>";
  }
?>
    </tbody>
  </table>
</div>

</body>
</html>
