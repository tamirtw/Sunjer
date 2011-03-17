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

    public function errorMessage($error)
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

    public function renderInternal($_viewFile_,$_data_=null,$_return_=false)
    {
        echo "bla";
                if(is_array($_data_))
                        extract($_data_,EXTR_PREFIX_SAME,'data');
                else
                        $data=$_data_;
                if($_return_)
                {
                        ob_start();
                        ob_implicit_flush(false);
                        require($_viewFile_);
                        return ob_get_clean();
                }
                else
                        require($_viewFile_);
    }

} 

?>