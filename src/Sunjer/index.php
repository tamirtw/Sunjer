<?php

    require_once 'Sunjer.php';
    $Sunjer = new Sunjer();
    $Sunjer->autoload();

    if(in_array("--help",$argv)){
        require 'base/DConsoleManual.php';
        require 'base/CController.php';
        $sunjerManual = new CController();
        $sunjerManual->renderInternal('/base/DConsoleManual.php');
    }
    

    if (isset($_SERVER['SERVER_NAME'])){
        $Sunjer->createApplication('createWebApplication');
    }

    else {
        $Sunjer->createApplication('createConsoleApplication');
    }
?>


