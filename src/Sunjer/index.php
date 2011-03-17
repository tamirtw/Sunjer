
<?php
    echo "\n\t\tWelcome To Sunjer Console Mode.
           \tReading The Manual Type --help.
           \tDeveloped By Sunjer-Team ,
           \tMeet Us At :
           \t\thttp://www.project-sunjer.com/
           \tTamir Twena, Avi Cohen, Tal Yusov !";

    if($argv[1]=="--help") echo "\n\nuse renderInternal To RTM Page, /base/DConsoleManual\n\n";
    
    require_once 'Sunjer.php';
    $Sunjer = new Sunjer();
    $Sunjer->autoload();

    if (isset($_SERVER['SERVER_NAME'])){
        $Sunjer->createApplication('createWebApplication');
    }

    else {
        $Sunjer->createApplication('createConsoleApplication');
//        var_dump($argv);
    }
?>


