<?php

	require_once 'app/core/Init.php';

	if(!$username = Input::get('user')) {
		Redirect::to('index.php');
	} else {
		$user = new User($username);

		if(!$user->exists()) {
			Redirect::to(404);
		} else {
			$data = $user->data();
		}
		?>

		<section>
			<h3><?php echo escape($data->username); ?></h3>
			<p>Full Name : <?php echo escape($data->name); ?></p>
		</section>
		<?php
	}

?>

    </div>
</div>