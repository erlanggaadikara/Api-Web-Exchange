<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tripledice</title>
  <meta http-equiv="refresh" content="5"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Tripledice</h2>
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
  
  function getCurrencyCode($str) {
    switch (strtoupper($str)) {
      case "DOGE": return "dog";
      default:
        return strtolower($str);
    }
  }
  function getANXPROCode($str) {
    switch (strtolower($str)) {
      case "dog": return "DOGE";
      default:
        return strtoupper($str);
    }
  }
  function fetchMarket(){
  $markets = "BTCUSD,BTCHKD,BTCEUR,BTCCAD,BTCAUD,BTCSGD,BTCJPY,BTCCHF,BTCGBP,BTCNZD,LTCBTC,DOGEBTC,STRBTC,XRPBTC";
  $result = array();
  foreach(explode(",",$markets) as $market){
	  $market = str_replace("DOGE","DOG",$market);
	  $currency1 = getCurrencyCode(substr($market,0,3));
	  $currency2 = getCurrencyCode(substr($market,3,3));
	  $result[] = array($currency2, $currency1);
  }
  return $result;
  }
 
  foreach (fetchMarket() as $pair) {
  $currency1 = $pair[0];
  $currency2 = $pair[1];
  
  $key = getANXPROCode($currency2).getANXPROCode($currency1);
  $api = "https://anxpro.com/api/2/" . $key . "/money/ticker";
  $get = file_get_contents($api);
  $json = json_decode($get)->data;
  
  $no++;
  $last = $json->last->value;
  $low = $json->low->value;
  $high = $json->high->value;
  echo "
    <tr>
      <td>$no</td>
      <td>$key</td>
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