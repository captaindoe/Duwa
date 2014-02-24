<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Captaindoe\Duwa;

Duwa::setApiKey('a6840c1a9de89aadade4943cf5554eafe20dee22');
Duwa::setTestMode();

try {

    $send = Duwa::send(array(
        "letter" => '<html><body>Testutskick</body></html>',
        "recipient" => array(
            "name" => 'Sven Svensson',
            "company" => 'Testföretag AB',
            "address" => 'Sveavägen 41',
            "zipcode" => '11351',
            "district" => 'Stockholm'
        )
    ));

    var_dump($send);
} catch(Exception $ex) {

    echo $ex->getMessage();
}

?>