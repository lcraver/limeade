<?php

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'Username' => array(
					'required' => true,
					'min' => 2,
					'max' => 20
				),
				'Password' => array(
					'required' => true,
					'min' => 6
				)
			));

			if($validate->passed()) {
				$user = new User();

				$remember = (Input::get('Remember') === 'on') ? true : false;
				$login = $user->login(Input::get('Username'), Input::get('Password'), $remember);

				if($login) {
					Redirect::to('index');
				} else {
					echo '<div id="flashTop">Sorry, logging in failed!</div>';
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

        <h1 class="large">Login</h1>

        <div class="content">
            <p>
				<form class="pure-form" action="" method="post">
					<fieldset>

						<input type="text" name="Username" id="Username" value="<?php echo escape(Input::get('username')); ?>" placeholder="Username">

						<input type="password" name="Password" id="Password" autocomplete="off" placeholder="Password">

						<label for="Remember">
							<input type="checkbox" name="Remember" id="Remember"> Remember Me
						</label>

						<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
						
						<button type="submit" class="pure-button pure-button-primary">
							Login
						</button>

					</fieldset>
				</form>
			</p>
        </div>