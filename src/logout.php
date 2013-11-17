<?php

	require_once 'app/core/Init.php';

	$user = new User();
	$user->logout();

	Redirect::to('index.php');

?>