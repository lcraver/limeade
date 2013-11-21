<?php

	require_once 'app/core/Init.php';

	$user = new User();
	$user->logout();

	Session::flash('home', 'You have been logged out!');
	Redirect::to('index.php');

?>