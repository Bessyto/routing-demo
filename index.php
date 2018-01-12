<?php

//Require the autoload file
require_once ('vendor/autoload.php');

//Create an instance of the Base
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {
    echo '<h1>Routing demo</h1>';

//    $view = new View;
//    echo $view->render
//    ('view/home.html');
}
);

//Run Fat-Free
$f3->run();