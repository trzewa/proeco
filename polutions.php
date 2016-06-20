<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dane zanieczyszczen</title>
  </head>
  <body>
   
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<?php
$first;
$count;
for($id=$first;$id<=$count;$id++)
{
$url = "http://powietrze.malopolska.pl/_powietrzeapi/api/dane?act=danemiasta&ci_id=".$id;
$json = file_get_contents($url);
$json_data = json_decode($json, JSON_PRETTY_PRINT);
//echo "My token: ". var_dump($json_data);
	echo("Dane dla miasta: ".$json_data['dane']['city']["ci_city"]);
	echo("<br>");	
	echo("Data pomiaru: ".$json_data['dane']['forecast']['dzisiaj']['averages'][0]['cf_date']);
	echo("<br>");	
	echo ("<strong>Nazwa wskaźnika: ".$json_data['dane']['forecast']['dzisiaj']['details'][0]['fo_wskaznik']);
	echo ("</strong>");
	echo("<br>");
	echo ("<b>Wartość: ".$json_data['dane']['forecast']['dzisiaj']['details'][1]['fo_wartosc']);
	echo ("</b>");
	echo("<br>");	
	echo ("<strong>Nazwa wskaźnika: ".$json_data['dane']['forecast']['dzisiaj']['details'][1]['fo_wskaznik']);
	echo ("</strong>");
	echo("<br>");
	echo ("<b>Wartość: ".$json_data['dane']['forecast']['dzisiaj']['details'][1]['fo_wartosc']);
	echo ("</b>");
	echo("<br>");	
	echo ("<strong>Nazwa wskaźnika: ".$json_data['dane']['forecast']['dzisiaj']['details'][2]['fo_wskaznik']);
	echo ("</strong>");
	echo("<br>");
	echo ("<b>Wartość: ".$json_data['dane']['forecast']['dzisiaj']['details'][2]['fo_wartosc']);
	echo ("</b>");
	echo("<br>");	
	echo ("<strong>Nazwa wskaźnika: ".$json_data['dane']['forecast']['dzisiaj']['details'][2]['fo_wskaznik']);
	echo ("</strong>");
	echo("<br>");
	echo ("<b>Wartość: ".$json_data['dane']['forecast']['dzisiaj']['details'][2]['fo_wartosc']);
	echo ("</b>");
	echo("<br>");
	echo("<br>");
}

?>
  </body>
</html>