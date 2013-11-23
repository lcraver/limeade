<div class="pure-u-1" id="main">
    <div class="header">
        <h1>Update Name</h1>
        <h2>Change the name currently associated with your account.</h2>
    </div>

<?php

	$user = new User();

	if(!$user->isLoggedIn()) {
		Redirect::to('index');
	}

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'name' =>array(
					'required' => true,
					'min' => 2,
					'max' => 50
				)
			));

			if($validation->passed()) {
				try {
					$user->update(array(
						'name' => Input::get('name')
					));

					Session::flash('home', 'Your details have been updated.');
					Redirect::to('index');
				} catch(Exception $e) {
					die($e->getMessage());
				}
			} else {
				foreach ($validation->errors() as $error) {
					echo $error, '</br>';
				}
			}
		}
	}
?>

	<div class="content">
		<div class="pure-g-r grid-example">
			<div class="pure-u-1 l-centered">
		    	<div class="1-box">
					<p>
						<form class="pure-form pure-g-r" action="" method="post">
							<div class="pure-u-1-2">
								<label for="name">Name</label>
								<input type="text" name="name" value="<?php echo escape($user->data()->name); ?>">
							</div>

							<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
							
							<div class="pure-u-1-2">
								<input type="submit" value="Update">
							</div>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>