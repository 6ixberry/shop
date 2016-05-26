<?php

class shopstyle

{

	$colours_url = 'http://'.
	'api.shopstyle.com/api/v2/'.
	'colors?uid8144-31682988-12';
	$colours_json = file_get_contents($colour_url);
	$colours_array = json_decode($colours_json, true);

	public function getColours(){


	}

	public function getBrands(){

	}

	public function getSales(){

	}

	public function getSummerList(){

	}

	public function getShoesList(){

	}

	public function getDressesList(){

	}

	public function getSweatList(){

	}

	public function getSuitList(){

	}

	public function getTopsList(){

	}

	public function getBagsList(){

	}

	public function getJacketsList(){

	}

	public function getJewleryList(){

	}

	public function getFestivalList(){

	}

	public function getMenList(){

	}

	public function getHomeList(){
		
	}
	
}