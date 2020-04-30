$(function(){

	var apiKey = '9a9564f5aa0489a3c13527d0f5bbc28d';
	var baseUrl = 'https://cors-anywhere.herokuapp.com/api.openweathermap.org/data/2.5/weather?q=Bayonne,fr&appid=' + apiKey + '&units=metric&lang=fr';

	var x = new XMLHttpRequest();
	x.open('GET',baseUrl);
	x.setRequestHeader('X-Requested-With','XMLHttpRequest');
	x.send();

	console.log(baseUrl);

	var params = {
		url: baseUrl,
		type: 'GET'
	};
	
	$.ajax(params).done(function(response){

		$('.description-weather').text(response.weather[0].description); //Description

		var temp = Math.round(response.main.temp) + '°C';	//Température//

		$('.temp-weather').text(temp);

		var image = response.weather[0].icon; // Icône //
		$('.image-weather').attr('src', 'http://openweathermap.org/img/w/' + image + '.png');
		$('.image-weather').attr('alt', response.name)


	}).fail( () => {
		$('.description-weather').text("L'API est actuellement indisponible, veuillez nous excusez");
	})
});