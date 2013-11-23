<div class="pure-u-1" id="main">
    <div class="header">
        <h1>Profile</h1>
        <h2>Change and customize your account.</h2>
    </div>

<?php

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn()) {
?>

    <div class="content">
    	<div class="pure-g-r grid-example">
    		<div class="pure-u-2-5">
        		<div class="l-box">
            		<h3><a href="update">Update Profile</a></h3>
            		<p>
            		    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum dui turpis.
            		</p>
        		</div>
    		</div>
    		<div class="pure-u-3-5">
        		<div class="l-box">
            		<h3><a href="change-password">Change Password</a></h3>
            		<p>
            		    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum dui turpis.
            		</p>
        		</div>
    		</div>
		</div>
	</div>

<?php

	if($user->hasPermission('admin')) {
		echo '<p>You are an admin</p>';
	}

} else {

?>
	
    <div class="content">
        <div class="pure-g-r grid-example">
            <div class="pure-u-1 l-centered">
                <div class="1-box">
                    <p>You need to either <a href="login">Login</a> or <a href="register">Register</a>.</p>
                </div>
            </div>
        </div>
    </div>

<?php

}

?>

</div>