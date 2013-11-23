<div class="pure-u-1" id="main">
    <div class="header">
        <h1>Public Profile</h1>
        <h2>How others see your profile.</h2>
    </div>

<?php

if(!$username = $this->value) {
	Redirect::to('index');
} else {
	$user = new User($username);

	if(!$user->exists()) {
		Redirect::to(404);
	} else {
		$data = $user->data();
	}

?>

<div class="content">
<div class="pure-g-r grid-example">
    <div class="pure-u-1 l-centered">
        <div class="1-box">
           	<h3><?php echo escape($data->username); ?></h3>
			<p>
				Full Name: <?php echo escape($data->name); ?><br>
				Email: <?php echo escape($data->email); ?>
			</p>
        </div>
    </div>
</div>

<?php

}

?>

</div>