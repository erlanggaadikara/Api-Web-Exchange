<?php
$url="http://open-api.uex.com/open/api/common/symbols";
$get=file_get_contents($url);
$json=json_decode($get);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UEX</title>
  <meta http-equiv="refresh" content="5"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>UEX</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Pair</th>
        <th>Last Price</th>
        <th>Low Price</th>
        <th>High Price</th>
      </tr>
    </thead>
    <tbody>
<?php
  $no=0;
  
  foreach ($json->data as $pair) {
  $pair1 = $pair->symbol;
  
  $api = "https://open-api.uex.com/open/api/get_ticker?symbol=".$pair1;
  $gets = file_get_contents($api);
  $jsons = json_decode($gets)->data;
  
  $no++;
  $last = number_format((float)$jsons->last,8);
  $low = number_format((float)$jsons->low,8);
  $high = number_format((float)$jsons->high,8);
  echo "
    <tr>
      <td>$no</td>
      <td>$pair1</td>
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