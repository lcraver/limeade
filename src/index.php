<?php

	require_once 'app/core/Init.php';

	if(Session::exists('home')) {
		echo '<p>' . Session::flash('home') . '</p>';
	}

?>