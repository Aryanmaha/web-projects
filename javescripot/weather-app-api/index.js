let weather = {
  "apiKey": "bf537c26d3bde132d7598df6c70d3f00",
  fetchWeather: function (city){
    fetch(
      "https://api.openweathermap.org/data/2.5/weather?q="
      + city
      + "&units=metric&appid="
      + this.apiKey
    )
    .then((response) => response.json())
    .then((data) => this.displayWeather(data));
  },
  displayWeather: function(data){
    const { name, dt } = data;
    const { icon, description } = data.weather[0];
    const { temp, feels_like, temp_min, temp_max, pressure, humidity } = data.main;
    const { speed } = data.wind;
    var datetime = new Date(dt*1000);
    var month = datetime.getMonth() + 1;
    var date = datetime.getDate();
    var year = datetime.getYear();
    var hours = datetime.getHours();
    var minutes = datetime.getMinutes();
    var second = datetime.getSeconds();
    document.querySelector(".city").innerText =  name;
    document.querySelector(".icon").src = "https://openweathermap.org/img/wn/" + icon + ".png";
    document.querySelector(".temp").innerText = temp + "°C"  ;
    document.querySelector(".time").innerText = hours + ":" + minutes + ":" + second;
    document.querySelector(".description").innerText = description;
    document.querySelector(".feels_like").innerText = "Feels like temp: " + feels_like + "°C";
    document.querySelector(".temp_min").innerText = "Minimum temp: " + temp_min + "°C";
    document.querySelector(".temp_max").innerText = "Maximum temp: " + temp_max + "°C";
    document.querySelector(".pressure").innerText = "Pressure:" + pressure + " hPa";
    document.querySelector(".humidity").innerText = "Humidity: " + humidity + "%";
    document.querySelector(".wind").innerText = "Wind speed: " + speed + "km/h";
    document.querySelector(".others").classList.remove("loading");
    document.querySelector(".left").classList.remove("loading");
    document.body.style.backgroundImage = "url('https://source.unsplash.com/1600x900/?"+ name +"')"
  },
  search: function(){
    this.fetchWeather(document.querySelector(".search-bar").value);
  }
};
document.querySelector(".search button").addEventListener("click", function(){
  weather.search();
});
document.querySelector(".search-bar").addEventListener("keyup", function(event){
  if (event.key == "Enter"){
    weather.search();
  }
});
weather.fetchWeather("sydney");
