<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
<div class="container">
        <div class="app-logo">Weather App</div>
        <div class="heading">
            <form class="search-bar" action="weather.php" method="get">
                <input type="text" name="city" placeholder="Enter the city name" class="search-form">
                <i class="fa-solid fa-magnifying-glass"></i>
            </form> 
        </div>
        <div class="weather__body">
        <h1 class="city"><?php echo $city; ?></h1>
        <img src="https://openweathermap.org/img/w/<?php echo $currentWeather['weather'][0]['icon']; ?>.png" alt="Weather Icon">
            <div>Date : <?php echo date('Y-m-d', time()); ?></div>
            <div><?php echo date('l'); ?></div>
            <div class="forecast"></div>
            <div class="icon"></div>
            <p class="temperature"><?php echo $currentWeather['main']['temp']; ?>°C</p>
        </div>

        <div class="weather__info">
            <div class="weather__condition">
                <i class="fa-solid fa-temperature-full"></i>
                <div>
                    <p>Temperature</p>
                    <p class="weather__realfeel"><?php echo $currentWeather['main']['temp']; ?>°C</p>
                </div>
            </div>
            
            <div class="weather__condition">
                <i class="fa-solid fa-droplet"></i>
                <div>
                    <p>Humidity</p>
                    <p class="weather__humidity"><?php echo $currentWeather['main']['humidity']; ?>%</p>
                </div>
            </div>
            <div class="weather__condition">
                <i class="fa-solid fa-wind"></i>
                <div>
                    <p>Wind</p>
                    <p class="weather__wind"><?php echo $currentWeather['wind']['speed']; ?> m/s</p>
                </div>
            </div>
            <div class="weather__condition">
                <i class="fa-solid fa-gauge-high"></i>
                <div>
                    <p>Pressure</p>
                    <p class="weather__pressure"><?php echo $currentWeather['main']['pressure']; ?> hPa</p>
                </div>
            </div>
        </div>
</div>
       

<div class="forecast">
    <?php
    foreach ($pastWeather as $day) {
        echo "<div class='forecast-day'>";
        echo "<h3>" . date('l', $day['dt']) . "</h3>";
        echo "<p>Date: " . date('Y-m-d', $day['dt']) . "</p>";
        echo "<img src='https://openweathermap.org/img/w/{$day['weather'][0]['icon']}.png' alt='Weather Icon'>";
        echo "<p>Temperature: " . $day['main']['temp'] . "°C</p>";
        echo "<p>Humidity: " . $day['main']['humidity'] . "%</p>";
        echo "<p>Pressure: " . $day['main']['pressure'] . " hPa</p>";
        echo "<p>Wind Speed: " . $day['wind']['speed'] . " m/s</p>";
        echo "</div>";
    }
    ?>
</div>
</div>


            </div>
            <script src="https://kit.fontawesome.com/40d55552c3.js" crossorigin="anonymous"></script>
            </body>
</html>