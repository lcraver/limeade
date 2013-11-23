<?php

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn()) {
?>

<div class="pure-u-1" id="main">
	<div class="header">
    	<h1>Limeade</h1>
    	<h2>80% PHP, 20% CSS, AND 100% REAL FRUIT JUICE</h2>
    </div>

    <div class="content">
    	<div class="pure-g-r grid-example">
    		 <div class="pure-u-1 l-centered">
                <div class="1-box">
                    <p>Home Page</p>
                </div>
            </div>
		</div>
	</div>
</div>

<?php

	if($user->hasPermission('admin')) {
		echo '<p>You are an admin</p>';
	}

} else {
	echo '<section><p>You need to <a href="login">login</a> or <a href="register">register</a>!</p></section>';
}
?>
</section>