<?php


//require_once('base/CApplication.php');

class Sunjer
{

    public $classMap;
    public $_aliases;
    public $_imports;
    public $_app;
    public $_logger;
    public $_coreClasses;

    public function app()
    {
       
    }

    public function createApplication($Application)
    {
        $this->$Application();
    }

    public function createWebApplication()
    {
        $createWebApp = new CCodeGenerator('generator/jsonExampleFile/Structure.json');
    }

    public function createConsoleApplication()
    {
        echo "Console Application\n";
    }

    public function setApplication()
    {
    
    }

    public function getVersion()
    {
        
    }

    public function import()
    {
  
    }

    public function msg()
    {
 
    }

    public function autoload()
    {
       require 'ClassAutoLoader.php';
       spl_autoload_register(array('ClassAutoLoader','load'));
    }

    public function getAliasPath()
    {

    }

    public function setAliasPath()
    {

    }

    public function log()
    {

    }

    public function loadComponent()
    {

    }

} 

?>