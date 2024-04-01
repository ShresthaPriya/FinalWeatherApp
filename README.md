# FinalWeatherApp
I have completed making this app in 3 stages:
1st:
In this first stage of app, I made a simple HTML/JavaScript page to retrieve live weather data from the OpenWeatherMap API and present the information suitably on a webpage.
When the weather app loads for the first time, it displays the weather info of the assigned city and a search bar is added to search for any desired city afterwards.

2nd:
In this second stage, I implemented server-side caching of the weather data, in order to avoid accessing the OpenWeatherMap API too often. This will be achieved with PHP and MySQL, as covered in the workshops. Moreover, the app is able to display the weather information of the past week, all the weather data of the past week is also loaded from the database.

3rd:
In this final stage, I implemented browser caching of the weather data, in order to avoid network / server access when not required. This can be achieved with the localStorage JavaScript API. (The localStorage contains all the info that should be displayed in the weatherApp in an organized format) The app is hosted  on a free web hosting platform and also enable client side chasing to make the webpage accessible in offline mode.
