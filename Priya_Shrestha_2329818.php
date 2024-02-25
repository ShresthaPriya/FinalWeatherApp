<?php
include 'connection.php';

$apiKey = "11c079f77a1592d8686c3a453bc3f1ad"; // OpenWeatherMap API key

function getWeatherData($city, $apiKey) {
    
    $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";
    $json = file_get_contents($url);
    return json_decode($json, true);
}

function getForecastData($city, $apiKey) {
    $url = "https://api.openweathermap.org/data/2.5/forecast?q={$city}&units=metric&appid={$apiKey}";
    $json = file_get_contents($url);
    return json_decode($json, true);
}

$defaultCity = 'Bakersfield';
if (isset($_GET['city']) && !empty($_GET['city'])) {
    $city = str_replace(' ', '+', htmlspecialchars($_GET['city']));
} else {
    $city = $defaultCity;
}

$endDate = date('Y-m-d', strtotime('-1 day')); // yesterday
$startDate = date('Y-m-d', strtotime('-7 day')); // 7 days before yesterday
$pastForecast = getPastForecastData($conn, $city, $startDate, $endDate);

$currentWeather = getWeatherData($city, $apiKey);
$forecast = getForecastData($city, $apiKey);
saveForecastData($conn, $city, $forecast);
function saveForecastData($conn, $city, $forecast) {
    $stmt = $conn->prepare("INSERT INTO forecast_data (city, date, temperature, humidity, pressure, wind_speed) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssddid", $city, $date, $temperature, $humidity, $pressure, $windSpeed);

    foreach ($forecast['list'] as $day) {
        $date = date('Y-m-d', $day['dt']);
    
        // Check if the data for the city and date already exists in the database
        $existingData = getPastForecastData($conn, $city, $date, $date);
        if (count($existingData) > 0) {
            // Skip this day if data already exists
            continue;
        }
    
        $temperature = $day['main']['temp'];
        $humidity = $day['main']['humidity'];
        $pressure = $day['main']['pressure'];
        $windSpeed = $day['wind']['speed'];
        
        $stmt->execute();
    }
}

// ... other functions ...

function getPastWeatherData($city, $apiKey) {
    $endDate = strtotime('-1 day');
    $startDate = strtotime('-7 day');

    $pastWeather = array();
    for ($i = $startDate; $i <= $endDate; $i += 86400) {
        $url = "https://history.openweathermap.org/data/2.5/history/city?q={$city}&type=hour&start={$i}&cnt=1&appid={$apiKey}&units=metric";
        $json = file_get_contents($url);
        $data = json_decode($json, true);

        if (!empty($data['list'])) {
            $pastWeather[] = $data['list'][0];
        }
    }

    return $pastWeather;
}


$pastWeather = getPastWeatherData($city, $apiKey);



    

function getPastForecastData($conn, $city, $startDate = null, $endDate = null) {
    $query = "SELECT date, temperature, humidity, pressure, wind_speed FROM forecast_data WHERE city = ?";

    $params = array($city);
    
    if ($startDate !== null && $endDate !== null) {
        $query .= " AND date BETWEEN ? AND ?";
        $params[] = $startDate;
        $params[] = $endDate;
    }
    
    $query .= " ORDER BY date ASC";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    $stmt->execute();
    $result = $stmt->get_result();

    $pastForecast = array();
    while ($row = $result->fetch_assoc()) {
        $pastForecast[] = $row;
    }

    $stmt->close();
    return $pastForecast;
}




$iconCode = $currentWeather['weather'][0]['icon'];
$iconUrl = "https://openweathermap.org/img/w/{$iconCode}.png";

// frontend HTML code
include 'index.php';
?>