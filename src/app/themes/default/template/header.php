<head>
	<?php

	# Load all of the selected theme's CSS files
	$dirCSS = Config::get('site/url').'app/themes/'.Config::get('site/theme').'/css';
	$fpCSS = opendir($dirCSS);
	while ($fileCSS = readdir($fpCSS)) {
	        if (strpos($fileCSS, '.css',1))
	            $resultsCSS[] = $fileCSS;
	    }
	closedir($fpCSS);

	foreach ($resultsCSS as $resultCSS) {
		echo '<link rel="stylesheet" href="'.$dirCSS.'/'.$resultCSS.'">';
	}


	# Load all of the selected theme's javascript files
	$dirJS = Config::get('site/url').'app/themes/'.Config::get('site/theme').'/js';
	$fpJS = opendir($dirJS);
	while ($fileJS = readdir($fpJS)) {
	        if (strpos($fileJS, '.js',1))
	            $resultsJS[] = $fileJS;
	    }
	closedir($fpJS);

	foreach ($resultsJS as $resultJS) {
		echo '<script src="'.$dirJS.'/'.$resultJS.'"></script>';
	}

	?>
	<!-- Script to have Session Flash Messages animate up and then down -->
	<script>
	$(document).ready(function() {
		$('div#flash').slideDown('slow').delay(2000).slideUp('slow');
		$('div#flashTop').slideDown('slow').delay(10000).slideUp('slow');
	});
	</script>
</head>
