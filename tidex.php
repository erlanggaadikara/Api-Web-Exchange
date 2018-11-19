<?php
$url="https://api.tidex.com/api/3/info";
$get=file_get_contents($url);
$json=json_decode($get);

//echo "<pre>";
//print_r($json);
//echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tidex</title>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="5"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Tidex</h2>
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
  $cek=0;
  foreach ($json->pairs as $data=>$pairs) {
    if($cek==0){
    $kumpul="$data";
    }
    else{
      $kumpul="$kumpul-$data";
    }
    $cek++;
  }
  $url1="https://api.tidex.com/api/3/ticker/$kumpul";
  $get1=file_get_contents($url1);
  $json1=json_decode($get1);
  $no=0;
  foreach ($json1 as $pair=>$coin) {
    $no++;
    $last=number_format((float)$coin->last,9);
    $low=number_format((float)$coin->low,9);
    $high=number_format((float)$coin->high,9);
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
