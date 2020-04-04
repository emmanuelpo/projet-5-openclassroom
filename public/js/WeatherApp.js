$(function(){

	var apiKey = 'd582b2072c7f543b4510de643d171854';
	var baseUrl = 'https://cors-anywhere.herokuapp.com/api.openweathermap.org/data/2.5/weather?q=Bayonne,fr&appid=' + apiKey + '&units=metric&lang=fr';

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


	});
});