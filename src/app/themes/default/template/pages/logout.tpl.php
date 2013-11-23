<?php

	$user = new User();
	$user->logout();

	Session::flash('home', 'You have been logged out!');
	Redirect::to('index');

?>