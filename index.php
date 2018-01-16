<?php

session_start();

//Require the autoload file
require_once ('vendor/autoload.php');

//Create an instance of the Base
$f3 = Base::instance();

//Set debug level (comes after we instantiate f3) 3 is maxi level of debugging
$f3->set ('DEBUG', 3);

//-----------------------------------------------------------------------------------

//Define a route using parameter, name is like a variable, we can pass any name to it

$f3->route('GET /hello/@name', function($f3, $params) {
    //if a run routing-demo/hello/Bessy  (is going to add my name to the message in the page)

    //$name = $params['name'];
    //echo "<h1>Hello, $name</h1>";

    //creating a variable in fat free with key=name and value=parameters, if the user writes hello and name
    //it redirect the user to views and hello.html
    $f3->set('name',$params['name']);
    $template = new Template();
    echo $template->render('views/hello.html');
}
);

//Define a routing using several parameters
//In the browser /328/routing-demo/hi/Bessy/Torres
$f3->route('GET /hi/@first/@last',
    function($f3, $params)
    {

    //creating a variable in fat free with key=name and value=parameters, if the user writes hello and name
    //it redirect the user to views and hello.html
    $f3->set('first',$params['first']);
    $f3->set('last',$params['last']);
    $f3->set('message','Hi');   //I can pass just data also, not just parameters

    //things we want to store, put the parameters in the array
    $_SESSION['first'] = $f3->get('first'); //getting first from fat free and put in in session
    $_SESSION['last'] = $f3->get('last');

    $template = new Template();
    echo $template->render('views/hi.html');
}
);

//
$f3->route('GET /hi-again',
    function($f3, $params)
    {
        echo '<h3>Hello again!' .$_SESSION['first'] . '</h3>';

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
        //if I want to reroute to my demo index page
        case 'french':
            $f3->reroute('/');
        //404 error
        default:
            $f3->error(404);
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

//Define a default route
$f3->route('GET /', function() {
    echo '<h1>Routing Demo page</h1>';
}
);

//Run Fat-Free
$f3->run();