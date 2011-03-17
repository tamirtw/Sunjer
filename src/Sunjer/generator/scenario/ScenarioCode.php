<?php

class ScenarioCode extends CCodeModel
{
    public $warnings;
    public $template = null;
    public $file = null; //CFileResource
    public $status;

    public function  __construct($request)
    {
        $this->warning = array();
        $this->template = $this->getTemplatePath();
        //$this->file = new CFileResource();
        $this->status = FALSE;

        $this->prepare($request);
    }

    protected function prepare($request)
    {
        //This Function Prepare Json & Validate Values !
        //TODO ASK ELI WHY file_exists not working ?!
        if($this->validateTemplate()){
            $this->generate($request);
        }

        else $this->errorMessage();
    }

    public function getTemplatePath()
    {
        //Where is the Path to the template
        return dirname(__FILE__)."/templates/default/secnario.php";
    }

    public function generate($request)
    {
        $this->renderInternal($this->template,$request);
    }

    public function validateTemplate()
    {
        return file_exists($this->template);

    }

    public function successMessage()
    {
        echo "This Template Was Create Succsefully"."<br>"."<br>";
    }

    public function errorMessage($error)
    {
     array_push($warning,$error);
     //TODO Call errorRender And show the error/e to user
    }

    public function printJsonValues($request)
    {

    }



}

?>