<?php
    namespace App;
    use \ZMQContext;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $name = "Sid"; //$_POST['txtName'];

    $entryData = array(
        'name'      =>  $name,
        'category'  =>  'kittensCategory'
    );

    // This is our new stuff
    $context = new ZMQContext();
    $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
    $socket->connect("tcp://localhost:5555");

    $socket->send(json_encode($entryData));

    //header('Location: index.php');
?>