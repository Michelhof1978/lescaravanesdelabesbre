<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="">
<p class="campagne">VENEZ DECOUVRIR LA BEAUTE DE LA CAMPAGNE</p>

<span id="sl_play" class="sl_command"></span>
<span id="sl_pause" class="sl_command"></span>
 
<span id="sl_i1" class="sl_command sl_i"></span>
<span id="sl_i2" class="sl_command sl_i"></span>
<span id="sl_i3" class="sl_command sl_i"></span>
<span id="sl_i4" class="sl_command sl_i"></span>
<section id="slideshow">

    <a class="play_commands pause" href="#sl_pause" title="Maintain paused">Pause</a>
    <a class="play_commands play" href="#sl_play" title="Play the animation">Play</a>

   
	<div class="container">
		<div class="c_slider"></div>
		<div class="slider">
			<figure>
				<img src="../images/oies.jpg" alt="" width="640" height="310" />
				<figcaption>Ballades au bord des étangs</figcaption>

			</figure><!--
			--><figure>
				<img src="../images/tournesol.jpg" alt="" width="640" height="310" />
				<figcaption>Champs de tournesols</figcaption>
			</figure><!--
			--><figure>
				<img src="../images/poule.jpg" alt="" width="640" height="310" />
				<figcaption>Fermes Pédagogiques</figcaption>

			</figure><!--
			--><figure>
				<img src="../images/nature.jpg" alt="" width="640" height="310" />
				<figcaption>Se promener dans la nature</figcaption>
			</figure>
		</div>
	</div>
		
	<span id="timeline"></span>

    <ul class="dots_commands"><!--
	--><li><a title="Afficher la slide 1" href="#sl_i1">Slide 1</a></li><!--
	--><li><a title="Afficher la slide 2" href="#sl_i2">Slide 2</a></li><!--
	--><li><a title="Afficher la slide 3" href="#sl_i3">Slide 3</a></li><!--
	--><li><a title="Afficher la slide 4" href="#sl_i4">Slide 4</a></li>
</ul>

</section>
<script src="../js/caroussel.js"></script>

 <!-- BOOTSTRAP JavaScript -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>