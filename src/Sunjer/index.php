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

    echo "\n\t\tWelcome To Sunjer Console Mode.
           \tReading The Manual Type --help.
           \tDeveloped By Sunjer-Team ,
           \tMeet Us At :
           \t\thttp://www.project-sunjer.com/
           \tTamir Twena, Avi Cohen, Tal Yusov !";

        $Sunjer->createApplication('createConsoleApplication');
//        var_dump($argv);
    }
?>


