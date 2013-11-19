<?php

	session_start();

	$GLOBALS['config'] = array(
		'site' => array(
			'url' => '',
			'title' => 'Limeade',
			'theme' => 'default',
			'email_activation' => false
		),
		'mysql' => array(
			'host' => '127.0.0.1',
			'username' => 'root',
			'password' => '',
			'db' => 'limeade'
		),
		'remember' => array(
			'cookie_name' => 'hash',
			'cookie_expiry' => 604800 //
		),
		'session' => array(
			'session_name' => 'user',
			'token_name' => 'token'
		)
	);


	spl_autoload_register(function($class) {
		require_once 'app/classes/' . $class . '.php';
	});

	require_once 'app/functions/Sanitize.php';
	include 'app/themes/default/template/header.php';

	if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
		$hash = Cookie::get(Config::get('remember/cookie_name'));
		$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

		if($hashCheck->count()) {
			$user = new User($hashCheck->first()->user_id);
			$user->login();
		}
	}
	
?>