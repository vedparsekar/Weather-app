<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/pulse/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
       
$(document).ready(function(){  
    $("#hide").click(function(){
        $("#more").hide(1000);
        $("#hide").hide(1000);
        $("#show").show(1000);

    });
    $("#show").click(function(){
    $("#more").show(1000);
    $("#hide").show(1000);
    $("#show").hide(1000);
    });
});
</script>


</head>
<body>
<div align="center">
<nav class="navbar-dark bg-dark">
<div align="center">
  <h1 class="navbar-brand" href="#"><span style="font-size: 25px;">
<i class="fas fa-sun"></i>
</span>Weather</h1></div>
<div align="center">
</nav>
<br>
<div align="center">
    <form  method="post">
      <input type="text" placeholder="Search" name="city">
      <button class="btn btn-sm btn-dark" type="submit"><span style="font-size: 12px;">
<i class="fas fa-search"></i>
</span>Search</button>
    </form>
</div>
<div align="center">
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $st="http://api.openweathermap.org/data/2.5/weather?q=".$_POST["city"]."&appid=bfeb2c9b87988f241e1b28f75ff77982"; 
}
else
$st="http://api.openweathermap.org/data/2.5/weather?q=india&appid=bfeb2c9b87988f241e1b28f75ff77982";
$json = file_get_contents($st);
if($json==NULL)
{
    echo "ERROR!!!!!!!!!!!!!!";
    $st="http://api.openweathermap.org/data/2.5/weather?q=india&appid=bfeb2c9b87988f241e1b28f75ff77982";
}
else{

$data = json_decode($json);
echo '<div class="jumbotron"><h1 id="city"><span style="font-size: 30px;">
<i class="fas fa-map-marker-alt"></i>
</span>', $data->name,'</h1>';

echo '<h2>Temperature:</h2>';
echo '<p><strong>Current:</strong> ', $data->main->temp/10, '° C</p>';
echo '<p><span style="font-size: 25px;">
<i class="fas fa-temperature-low"></i>
</span><strong>Min:</strong> ', $data->main->temp_min/10, '° C&nbsp&nbsp';
echo '<span style="font-size: 25px;">
<i class="fas fa-temperature-high"></i>
</span><strong>Max:</strong> ', $data->main->temp_max/10, '° C</p>';

echo '<div id="more"><br><h2>Air</h2>';
echo '<p><span style="font-size: 15px;">
<i class="fas fa-tint"></i>
</span><strong>Humidity:</strong> ', $data->main->humidity, '%</p>';
echo '<p><span style="font-size: 15px;">
<i class="fas fa-cloud-sun-rain"></i>
</span><strong>Pressure:</strong> ', $data->main->pressure, ' hPa</p>';

echo '<br><h2>Wind</h2>';
echo '<p><span style="font-size: 15px;">
<i class="fas fa-wind"></i>
</span><strong>Speed:</strong> ', $data->wind->speed, ' m/s</p>';
echo '<p><span style="font-size: 15px;">
<i class="fas fa-location-arrow"></i>
</span><strong>Direction:</strong> ', $data->wind->deg, '°</p>';

echo '<br><h2>The Weather</h2>';
echo '<ul>';
foreach ($data->weather as $weather) {
    echo '<li>', $weather->description, '</li>';
}
echo '<ul></div>';
}
?>
<span style="font-size: 30px;">
<i class="fas fa-angle-up" id="hide"></i>
</span>
<span style="font-size: 30px;">
<i class="fas fa-angle-down" id="show"></i>
</span>
<div>
</div>
</body>
</html>
