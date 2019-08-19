<?php

include_once 'config.php';

if ($_GET["link"] != '') {
    include("lang/" . $language . ".php");
    include("template/" . $themeName . "/header.php");
    include("template/" . $themeName . "/download.php");
    include("template/" . $themeName . "/footer.php");
} else {
    $redirectURL = "http://" . $siteDomain;
    header('Location: ' . $redirectURL);
    die();
}