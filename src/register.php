<?php
    /*
     * Here we setup the a signup page
     * Showing an example of using a template within another template
     * here we put the signup form inside our main template
     */

    require_once 'app/core/Init.php';

    /*Loading template files the 2 methods available*/

    $head = new Template("app/themes/".Config::getDBActiveSetting('theme')."/template/header.tpl.php");
    $page = new Template("app/themes/".Config::getDBActiveSetting('theme')."/template/main.tpl.php");
    $navbar = new Template("app/themes/".Config::getDBActiveSetting('theme')."/template/navbar.tpl.php");
    $content = new Template("app/themes/".Config::getDBActiveSetting('theme')."/template/pages/register.tpl.php");
    $footer = new Template("app/themes/".Config::getDBActiveSetting('theme')."/template/footer.tpl.php");

    /*Setting variables using the 2 methods*/
    $page->title = "Signup";
    $page->set("head", $head->parse());
    $page->set("navbar", $navbar->parse());
    $page->set("content", $content->parse());
    $page->set("footer", $footer->parse());
    /*Outputting the data to the end user*/
    $page->publish();