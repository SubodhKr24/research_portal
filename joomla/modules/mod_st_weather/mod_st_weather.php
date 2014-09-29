<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
	$key = $params->get('your_key');
	$country = $params->get('your_country');
	$city = $params->get('city_name');
  	$json_string = file_get_contents("http://api.wunderground.com/api/${key}/conditions/q/${country}/${city}.json");
	$parsed_json = json_decode($json_string);
	
	if(isset($parsed_json->{'current_observation'}->{'display_location'}->{'full'})){
		$location = $parsed_json->{'current_observation'}->{'display_location'}->{'full'};
	}else{
		$location = "Unknown";
	}
	
	if(isset($parsed_json->{'current_observation'}->{'weather'})){
		$weather = str_replace(' ', '-', $parsed_json->{'current_observation'}->{'weather'});
	}else{
		$weather = "Unknown";
	}
	
	if(isset($parsed_json->{'current_observation'}->{'temp_c'})){
		$temp_c  = $parsed_json->{'current_observation'}->{'temp_c'};
	}else {
		$temp_c = "Unknown";
	}
	
	$array = array("Chance-of-a-Thunderstorm","Chance-of-Flurries","Chance-of-Rain",
	"Chance-of-Sleet","Chance-of-Snow","Clear","Cloudy","Flurries","Hazy","Mist","Drizzle","Light-Drizzle",
	"Mostly-Cloudy","Mostly-Sunny","Partly-Cloudy","Partly-Sunny","Rain","Sleet",
	"Snow","Sunny","Thunderstorm");
	
	if(in_array($weather, $array)){
		$weather = $weather;
	}else{
		$weather = "Unknown";
	}
	
	$background = JURI::base().'modules/mod_st_weather/icon/'.$weather.'.png';
	$html=" <div class='weather'>
			<p class='text'>
			<span>Weather &nbsp;</span>
			".$location."&nbsp;&nbsp;".$temp_c."&deg;C</p>";
	$html.= "<p class=\"icon\" style=\"background:url(${background}) no-repeat 5px 5px;background-size:20px; height:30px; width:30px; \"></p>";
	$html.= "</div>";
	echo $html;
?>