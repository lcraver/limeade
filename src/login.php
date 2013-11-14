<?php

	require_once 'app/core/Init.php';

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username' => array(
					'required' => true,
					'min' => 2,
					'max' => 20
				),
				'password' => array(
					'required' => true,
					'min' => 6
				)
			));

			if($validate->passed()) {
				$user = new User();

				$login = $user->login(Input::get('username'), Input::get('password'));

				if($login) {
					Redirect::to('index.php');
				} else {
					echo '<p>Sorry, logging in failed!</p>';
				}

				/*
				try {
					$user->check(array(
						'username' => Input::get('username'),
						'password' => Hash::make(Input::get('password'), $salt),
						'active' => 1
					));

					Session::flash('home', 'You successfully logged in!');
					Redirect::to('index.php');

				} catch(Exception $e) {
					die($e->getMessage());
				}*/
			} else {
				foreach ($validation->errors() as $error) {
					echo $error, "<br>";
				}
			}
		}
	}

?>

<form action="" method="post">
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>">
	</div>
	<div class="field">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" autocomplete="off">

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Login">
</form>