<?php

	

?>


<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="pure-menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="<?php echo Config::get('site/homeurl'); ?>"><?php echo Config::get('site/title'); ?></a>

            <ul>
                <?php 

                    $navbar = Config::getDBSettings('navbar');

                    foreach ($navbar as $bar) {
                        foreach ($bar as $key => $value) {
                            switch ($key) {
                                case 'devide':
                                    echo '<li class="menu-item-divided"></li>';
                                    break;
                                
                                default:
                                    echo '<li><a href="'.Config::get('site/homeurl').'/'.$value.'">'.$key.'</a></li>';
                                    break;
                            }
                        }
                    }
                ?>

                    <li class="menu-item-divided"></li>

                <?php
                    $user = new User();
                    if($user->isLoggedIn()) {
                ?>

                    <li><a href="<?php echo Config::get('site/homeurl'); ?>/profile/<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a></li>
                    <li><a href="<?php echo Config::get('site/homeurl'); ?>/account">My Account</a></li>
                    <li><a href="<?php echo Config::get('site/homeurl'); ?>/logout">Logout</a></li>

                <?php
                    } else {
                ?>
                    <li><a href="login">Login</a></li>
                    <li><a href="register">Register</a></li>
                <?php    
                    }
                ?>
            </ul>
        </div>
    </div>

    <div id="main">