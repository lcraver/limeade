<?php

	require_once 'app/core/Init.php';

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'name' => array(
					'required' => true,
					'min' => 2,
					'max' => 50
				),
				'email' => array(
					'required' => true,
					'min' => 6,
					'max' => 128,
					'email' => true,
					'unique' => 'users'
				),
				'username' => array(
					'required' => true,
					'min' => 2,
					'max' => 20,
					'unique' => 'users'
				),
				'password' => array(
					'required' => true,
					'min' => 6
				),
				'password_again' => array(
					'required' => true,
					'matches' => 'password'
				)
			));

			if($validate->passed()) {
				$user = new User();

				$salt = Hash::salt(32);

				try {

					$emailCode = Hash::emailCode(Input::get('username'));

					if(Config::get('site/email_activation')) {
						$user->email(Input::get('email'), 'Activate your account', "Hello ".Input::get('name').",\n\nYou need to activate your limeade account, so please use the link below:\n http://".Config::get('site/url')."/activate.php?email=".Input::get('email')."&email_code={$emailCode} \n\n- Lime Studios");
						$active = 0;
					} else {
						$active = 1;
					}

					$user->create(array(
						'username' => Input::get('username'),
						'password' => Hash::make(Input::get('password'), $salt),
						'salt' => $salt,
						'name' => Input::get('name'),
						'email' => Input::get('email'),
						'email_code' => $emailCode,
						'joined' => date('Y-m-d H:i:s'),
						'group' => 1,
						'active' => $active
					));

					Session::flash('home', 'You have been registered and can now login!');
					Redirect::to('index.php');

				} catch(Exception $e) {
					die($e->getMessage());
				}
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
		<label for="name">Enter your name</label>
		<input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>">
	</div>
	<div class="field">
		<label for="email">Enter your Email</label>
		<input type="text" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>">
	</div>
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
	</div>
	<div class="field">
		<label for="password">Choose a password</label>
		<input type="password" name="password" id="password">
	</div>
	<div class="field">
		<label for="password_again">Enter your password again</label>
		<input type="password" name="password_again" id="password_again">
	</div>

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Register">
</form>