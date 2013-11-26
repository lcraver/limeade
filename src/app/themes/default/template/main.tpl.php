<html>
    <head>
        <title><?php print @$this->title; ?></title>
        <?php print @$this->head; ?>
        <?php print $this->head; ?>
    </head>
    <body>
    	<?php print $this->navbar; ?>
        <?php print $this->content; ?>
        <footer>
            <?php print $this->footer; ?>
        </footer>
    </body>
</html>