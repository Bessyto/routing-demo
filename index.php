<?php

//Require the autoload file
require_once ('vendor/autoload.php');

//Create an instance of the Base
$f3 = Base::instance();

//Set debug level (comes after we instantiate f3) 3 is maxi level of debugging
$f3->set ('DEBUG', 3);

//Define a route using parameter, name is like a variable, we can pass any name to it
//if a run routing-demo/hello/Bessy  (is going to add my name to the message in the page)
$f3->route('GET /hello/@name', function($f3, $params) {
    $name = $params['name'];
    echo "<h1>Hello, $name</h1>";
}
);

$f3->route('GET /language/@lang', function($f3, $params)
{
    switch($params['lang'])
    {
        case 'swahili':
            echo 'Jumbo!' ; break;
        case 'spanish':
            echo 'Hola!' ; break;
        case 'russian':
            echo 'Privet!' ; break;
        case 'farsi':
            echo 'Salam!' ; break;
        default:
            echo 'Hello';
    }

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

//echo will do the same that the template
$f3->route('GET /jewelry/rings/toe-rings', function(){
    //echo '<h1>Buy a Toe Rings</h1>';
    $template = new Template();
    echo $template->render('views/toe-rings.html');
}
);

//Define a page2 route
$f3->route('GET /page2', function() {
    echo '<h1>This is page 2</h1>';
}
);

//Run Fat-Free
$f3->run();