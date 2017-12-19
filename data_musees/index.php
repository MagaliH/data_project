<?php

require "./vendor/autoload.php";



$router = new AltoRouter();


$router->setBasePath('data_musees/');



$loader = new Twig_Loader_Filesystem('./views');

$twig = new Twig_Environment($loader, array(
    'cache' => false,
));





$router->map( 'GET', '/', function() {
    
    
    global $twig;
    
    
    $template = $twig->load('basic.html.twig');
    $data = ['Lucie', 'Floriane', 'Magalie', 'Antoine', 'Mourad'];
    
    $params =["tab
    " => $data];
    
    
    
    
    
    echo $template->render($params);
   
    
    
    
});


$router->map( 'GET', '/test', function() {
   
    echo "vous etes sur test !!";
    
    
    
});

































// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}




?>