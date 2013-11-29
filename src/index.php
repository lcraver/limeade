<?php
    /*
     * Here we setup the a signup page
     * Showing an example of using a template within another template
     * here we put the signup form inside our main template
     */

    require_once 'app/core/Init.php';

    $theme = Config::getDBActiveSetting('theme');

    /*Loading template files the 2 methods available*/
    $head = new Template("app/themes/".$theme."/template/header.tpl.php");
    $page = new Template("app/themes/".$theme."/template/main.tpl.php");
    $navbar = new Template("app/themes/".$theme."/template/navbar.tpl.php");

    if ($url = Input::get('url')) {

        $url = explode('/', $url);

        if (isset($url[0])) {
            $contentLink = $url[0];
        } 
    }
    else {
            $contentLink = 'index';
        }

    $content = new Template("app/themes/".$theme."/template/pages/".$contentLink.".tpl.php");
    $footer = new Template("app/themes/".$theme."/template/footer.tpl.php");

    if (isset($url[1])) {
        $content->set("value", $url[1]);
    }

    /*Setting variables using the 2 methods*/
    $page->title = Config::get('site/title').' - '.$contentLink;
    $page->set("head", $head->parse());
    $page->set("navbar", $navbar->parse());
    $page->set("content", $content->parse());
    $page->set("footer", $footer->parse());
    /*Outputting the data to the end user*/
    $page->publish();