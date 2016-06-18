<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dane zanieczyszczen</title>
  </head>
  <body>
    <a href="#" id="get-data">Get JSON data</a>
    <div id="show-data"></div>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<?php
$url = "http://powietrze.malopolska.pl/_powietrzeapi/api/dane?act=danemiasta&ci_id=02";
$json = file_get_contents($url);
$json_data = json_decode($json, JSON_PRETTY_PRINT);
//echo "My token: ". var_dump($json_data);
	echo("dane dla miasta: ".$json_data['dane']['city']["ci_countydesc"]);
	echo("<br>");
	echo("dane ze stacji: ".$json_data['dane']['actual'][0]['station_name']);
	echo("<br>");
	echo $json_data['dane']['actual'][0]['details'][0]['g_nazwa'];
	echo("<br>");	
	echo $json_data['dane']['actual'][0]['details'][0]['par_name'];
	echo("<br>");	
	echo $json_data['dane']['actual'][0]['details'][0]['par_desc'];
	echo("<br>");	
	echo $json_data['dane']['actual'][0]['details'][0]['par_unit'];
	echo("<br>");	
	echo $json_data['dane']['actual'][0]['details'][0]['par_html'];
?>
  </body>
</html>