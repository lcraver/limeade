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

?>