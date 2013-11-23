<?php

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn()) {
?>

<section>
<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->name); ?></a></p>

<p>Username: <?php echo escape($user->data()->username); ?></p>
<p>Email: <?php echo escape($user->data()->email); ?></p>

<ul>
	<li><a href="update.php">Update Profile</a></li>
	<li><a href="changepassword.php">Change Password</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>

<?php

	if($user->hasPermission('admin')) {
		echo '<p>You are an admin</p>';
	}

} else {
	echo '<section><p>You need to <a href="login.php">login</a> or <a href="register.php">register</a>!</p></section>';
}
?>
</section>