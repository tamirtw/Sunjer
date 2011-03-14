<?php

abstract class CCodeModel
{

    public $warnings;
    public $template = null;
    public $file = null;
    public $status;

    

    protected abstract function prepare($request);
   

    public function generate($request, $path)
    {
        
    }

    public function successMessage()
    {
        
    }

    public function errorMessage()
    {
     
    }

    public function getTemplatePath()
    {

    }

    public function validateTemplate()
    {
        
    }

    public function printJsonValues($request)
    {
        
    }

} 

?>