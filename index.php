<?php
	
	//Get colours from Shopstyle API
	$colours_url = 'http://api.shopstyle.com/api/v2/colors?pid=uid8144-31682988-12';
	$colours_json = file_get_contents($colours_url);
	$colours_array = json_decode($colours_json, true);

	//Get all available brands from the 6ixberry lists
	$brands_url = 'http://api.shopstyle.com/api/v2/lists?pid=uid8144-31682988-12&userId=6ixberry';
	$brands_json = file_get_contents($brands_url);
	$brands_array = json_decode($brands_json, true);

	//summer lists
	$summer_list = 'http://api.shopstyle.com/api/v2/lists/46629676/items?pid=uid8144-31682988-12';
	$summer_json = file_get_contents($summer_list);
	$summer_array = json_decode($summer_json, true);

	//sweat lists
	$sweat_list = 'http://api.shopstyle.com/api/v2/lists/46629970/items?pid=uid8144-31682988-12';
	$sweat_json = file_get_contents($sweat_list);
	$sweat_array = json_decode($sweat_json, true);

	//dresses lists
	$dresses_list = 'http://api.shopstyle.com/api/v2/lists/46629820/items?pid=uid8144-31682988-12';
	$dresses_json = file_get_contents($dresses_list);
	$dresses_array = json_decode($dresses_json, true);

	//shoes lists
	$shoes_list = 'http://api.shopstyle.com/api/v2/lists/46630014/items?pid=uid8144-31682988-12';
	$shoes_json = file_get_contents($shoes_list);
	$shoes_array = json_decode($shoes_json, true);
	

	//tops lists
	$tops_list = 'http://api.shopstyle.com/api/v2/lists/46656554/items?pid=uid8144-31682988-12';  
	$tops_json = file_get_contents($tops_list);
	$tops_array = json_decode($tops_json, true);

	//bags lists
	$bags_list = 'http://api.shopstyle.com/api/v2/lists/46635219/items?pid=uid8144-31682988-12';
	$bags_json = file_get_contents($bags_list);
	$bags_array = json_decode($bags_json, true);

	//jackets lists
	$jackets_list = 'http://api.shopstyle.com/api/v2/lists/46656569/items?pid=uid8144-31682988-12'; 
	$jackets_json = file_get_contents($jackets_list);
	$jackets_array = json_decode($jackets_json, true);

	//jewels lists
	$jewels_list = 'http://api.shopstyle.com/api/v2/lists/46643622/items?pid=uid8144-31682988-12';  
	$jewels_json = file_get_contents($jewels_list);
	$jewels_array = json_decode($jewels_json, true);

	//swim lists
	$swim_list = 'http://api.shopstyle.com/api/v2/lists/46656830/items?pid=uid8144-31682988-12';  
	$swim_json = file_get_contents($swim_list);
	$swim_array = json_decode($swim_json, true);

	//men lists
	$men_list = 'http://api.shopstyle.com/api/v2/lists/46656576/items?pid=uid8144-31682988-12'; 
	$men_json = file_get_contents($men_list);
	$men_array = json_decode($men_json, true);

	//home lists
	$home_list = 'http://api.shopstyle.com/api/v2/lists/46656604/items?pid=uid8144-31682988-12'; 
	$home_json = file_get_contents($home_list);
	$home_array = json_decode($home_json, true);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>6ix Berry | Shop</title>

		<!-- Google Fonts-->
		<link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400italic,400,700' rel='stylesheet' type='text/css'>
		
		<!-- Jquery CDN -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>

		<!-- Custom CSS-->
		<link rel="stylesheet" href="index.css">
	</head>
	
	<body>
		
		<div class="container">

				<div class="menu">
				
				<h2>6IX BERRY</h2>
				<div class="logo"></div>

				<p>Shop</p>

				<ul>
					<li><a href="#row-1">Summer</a></li>
					<li><a href="#row-2">Shoes</a></li>
					<li><a href="#row-3">Dresses</a></li>
					<li><a href="#row-4">Sweat Time</a></li>
					<li><a href="#row-6">Tops</a></li>
					<li><a href="#row-7">Bags</a></li>
					<li><a href="#row-8">Jackets</a></li>
					<li><a href="#row-9">Jewelery</a></li>
					<li><a href="#row-10">Swim</a></li>
					<li><a href="#row-11">Men</a></li>
					<li><a href="#row-12">Home</a></li>
				</ul>
			</div>

			<div class="item-component">

			<div class="filter-box">
				Filters: 
				<form action="/API/shopstyle.php">
					<label for="colours">Colours</label>
					<select id="colours" name="colours">
						<?php 
							if(!empty($colours_array)){
								foreach($colours_array['colors'] as $key=>$colours){
									echo '<option value="'.$colours['id'].'">'.$colours['name'].'</option>';
								}
							}
						?> 
  					</select>
  					<label for="brand">Brand</label>
  					<select id="brand" name="brand">
    						<?php 

    						if(!empty($brands_array)){
								for($i = 0; $i < sizeof($brands_array); $i++){
									foreach($brands_array['lists'] as $key=>$brands){
										echo '<option value="'.$brands['favorites'][$i]['product']['brand']['name'].'">'.$brands['favorites'][$i]['product']['brand']['name'].'</option>';
									}
								}
							}
						?> 
  					</select>
  					<label for="Discount">Discount</label>
  					<select id="brand" name="brand">
    					<option value="sale">Sale</option>
  					</select>
  					<label for="Order By">Order By:</label>
  					<select id="brand" name="brand">
    					<option value="usa">Price(High - Low)</option>
    					<option value="usa">Price(Low - High)</option>
    					<option value="usa">USA</option>
  					</select>
  					<button type="submit">Refine</button>
				</form>
			</div>

			<div id="row-1" class="item-row">
				<h1>Summer</h1>
				<?php 

    				if(!empty($summer_array)){	
						foreach($summer_array['favorites'] as $key=>$summer){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$summer['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$summer['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$summer['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
			<div id="row-2" class="item-row">
				<h1>Shoes</h1>
				<?php 

    				if(!empty($shoes_array)){	
						foreach($shoes_array['favorites'] as $key=>$shoes){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$shoes['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$shoes['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$shoes['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>

			<div id="row-3" class="item-row">
				<h1>Dresses</h1>
				<?php 

    				if(!empty($dresses_array)){	
						foreach($dresses_array['favorites'] as $key=>$dresses){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$dresses['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$dresses['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$dresses['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
			<div id="row-4" class="item-row">
				<h1>Sweat</h1>
				<?php 

    				if(!empty($sweat_array)){	
						foreach($sweat_array['favorites'] as $key=>$sweat){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$sweat['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$sweat['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$sweat['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
			<div id="row-6" class="item-row">
				<h1>Tops</h1>
				<?php 

    				if(!empty($tops_array)){	
						foreach($tops_array['favorites'] as $key=>$tops){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$tops['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$tops['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$tops['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
			<div id="row-7" class="item-row">
				<h1>Bags</h1>
				<?php 

    				if(!empty($bags_array)){	
						foreach($bags_array['favorites'] as $key=>$bags){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$bags['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$bags['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$bags['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
			<div id="row-8" class="item-row">
				<h1>Jackets</h1>
				<?php 

    				if(!empty($jackets_array)){	
						foreach($jackets_array['favorites'] as $key=>$jackets){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$jackets['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$jackets['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$jackets['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
			<div id="row-9" class="item-row">
				<h1>Jewels</h1>
				<?php 

    				if(!empty($jewels_array)){	
						foreach($jewels_array['favorites'] as $key=>$jewels){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$jewels['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$jewels['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$jewels['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
			<div id="row-10" class="item-row">
				<h1>Swim</h1>
				<?php 

    				if(!empty($swim_array)){	
						foreach($swim_array['favorites'] as $key=>$swim){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$swim['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$swim['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$swim['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
			<div id="row-11" class="item-row">
				<h1>Men</h1>
				<?php 

    				if(!empty($men_array)){	
						foreach($men_array['favorites'] as $key=>$men){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$men['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$men['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$men['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
			<div id="row-12" class="item-row">
				<h1>Home</h1>
				 <?php 

    				if(!empty($home_array)){	
						foreach($home_array['favorites'] as $key=>$home){
							echo '<div class="items">
									<div class="product-image-container">
										<a target="_blank" href="'.$home['product']['clickUrl'].'">
											<img class="search-result-image" src="'.$home['product']['image']['sizes']['XLarge']['url'].'">
										</a>
									</div>
									<div class="item-description">
										<p>'.$home['product']['brandedName'].'</p>
									</div>
								</div>'
							; 
						}					
					}
				?> 
			</div>
		</div>

		<div class="top-tag">
			<a href="#row-1">Top</a>
		</div>
	</div>

<script>
	$(function() {

		$(document).scroll(function(){
				$(".top-tag").fade( "fast", function() {
  			});
		});	

				
	});
</script>

</body>
</html>