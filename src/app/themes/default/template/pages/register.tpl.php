<?php

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'Name' => array(
					'required' => true,
					'min' => 2,
					'max' => 50
				),
				'Email' => array(
					'required' => true,
					'min' => 6,
					'max' => 128,
					'email' => true,
					'unique' => 'users'
				),
				'Username' => array(
					'required' => true,
					'min' => 2,
					'max' => 20,
					'unique' => 'users'
				),
				'Password' => array(
					'required' => true,
					'min' => 6
				),
				'PasswordAgain' => array(
					'required' => true,
					'matches' => 'Password'
				)
			));

			if($validate->passed()) {
				$user = new User();

				$salt = Hash::salt(32);

				try {

					$emailCode = Hash::emailCode(Input::get('Username'));

					if(Config::get('site/email_activation')) {
						$user->email(Input::get('Email'), 'Activate your account', "Hello ".Input::get('name').",\n\nYou need to activate your limeade account, so please use the link below:\n http://".Config::get('site/url')."/activate.php?email=".Input::get('email')."&email_code={$emailCode} \n\n- Lime Studios");
						$active = 0;
					} else {
						$active = 1;
					}

					$user->create(array(
						'username' => Input::get('Username'),
						'password' => Hash::make(Input::get('Password'), $salt),
						'salt' => $salt,
						'name' => Input::get('Name'),
						'email' => Input::get('Email'),
						'email_code' => $emailCode,
						'joined' => date('Y-m-d H:i:s'),
						'group' => 1,
						'active' => $active
					));

					Session::flash('home', 'You have been registered and can now login!');
					Redirect::to('index');

				} catch(Exception $e) {
					die($e->getMessage());
				}
			} else {
				echo '<div id="flashTop">';

				foreach ($validation->errors() as $error) {
					echo $error, "<br>";
				}

				echo '</div>';
			}
		}
	}

?>

<section>
	<form action="" method="post">
		<div class="field">
			<label for="Name">Enter your name</label>
			<input type="text" name="Name" id="Name" value="<?php echo escape(Input::get('name')); ?>">
		</div>
		<div class="field">
			<label for="Email">Enter your Email</label>
			<input type="text" name="Email" id="Email" value="<?php echo escape(Input::get('email')); ?>">
		</div>
		<div class="field">
			<label for="Username">Username</label>
			<input type="text" name="Username" id="Username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
		</div>
		<div class="field">
			<label for="Password">Choose a password</label>
			<input type="password" name="Password" id="Password">
		</div>
		<div class="field">
			<label for="PasswordAgain">Enter your password again</label>
			<input type="password" name="PasswordAgain" id="PasswordAgain">
		</div>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		<input type="submit" value="Register">
	</form>
</section>