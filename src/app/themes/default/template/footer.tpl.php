<?php 

    # Load all of the selected theme's javascript files
    $dirJS = 'app/themes/default/js';
    $fpJS = opendir($dirJS);
    while ($fileJS = readdir($fpJS)) {
            if (strpos($fileJS, '.js',1))
                $resultsJS[] = $fileJS;
        }
    closedir($fpJS);

    foreach ($resultsJS as $resultJS) {
        echo '<script src="'.Config::get('site/homeurl').'/'.$dirJS.'/'.$resultJS.'"></script>';
    }

?>

<!-- Script to have Session Flash Messages animate up and then down -->
    <script>
    $(document).ready(function() {
        $('div#flash').slideDown('slow').delay(2000).slideUp('slow');
        $('div#flashTop').slideDown('slow').delay(10000).slideUp('slow');
    });
    </script>