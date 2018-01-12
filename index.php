<?php

//Require the autoload file
require_once ('vendor/autoload.php');

//Create an instance of the Base
$f3 = Base::instance();

//Set debug level (comes after we instantiate f3)
$f3->set ('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {
    echo '<h1>Routing demo</h1>';
}
);

//Define a page1 route
$f3->route('GET /page1', function() {
    echo '<h1>This is page 1</h1>';
}
);

//Define a page1 route
$f3->route('GET /page1/subpage-a', function() {
    echo '<h1>This is page 1, sub page a</h1>';
}
);

//Define a page2 route
$f3->route('GET /page2', function() {
    echo '<h1>This is page 2</h1>';
}
);

//Run Fat-Free
$f3->run();