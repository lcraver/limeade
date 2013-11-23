<?php

	require_once 'app/core/Init.php';

	if(isset($_GET['email'], $_GET['email_code']) === true) {
		$user = new User();

		$email = 		trim($_GET['email']);
		$email_code = 	trim($_GET['email_code']);

		try {

			$emailCheck = DB::getInstance()->get('users', array('email', '=', $email))->first()->id;
			$emailCodeCheck = DB::getInstance()->get('users', array('email_code', '=', $email_code))->first()->id;

			if($emailCheck == $emailCodeCheck) {
				$user->update($emailCheck, array(
					'active' => 1
				));

				Session::flash('home', 'Your account has been activated and you can now login!');
				Redirect::to('index');
			} else {
				Session::flash('home', 'Your account could not be activated!');
				Redirect::to('index');
			}

		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

?>