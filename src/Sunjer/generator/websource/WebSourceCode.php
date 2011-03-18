<?php


class WebSourceCode extends CCodeModel
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
    }

    public function prepare($request)
    {
        //This Function Prepare Json & Validate Values !
        //TODO ASK ELI WHY file_exists not working ?!
        if($this->validateTemplate()){
            $this->generate($request);
            return true;
        }
        
        else {
            $this->errorMessage();
            return false;
        }
    }

    public function getTemplatePath()
    {
        //Where is the Path to the template
        return dirname(__FILE__)."/templates/default/websource.php";
    }

    public function generate($request)
    {
        $this->file = $this->renderInternal($this->template,$request,true);
        return;
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
       echo $request['generate']."</br>";
       echo "className: ".$request['className']."</br>";
       echo "appID :".$request['appID'];
       echo "</br>"."</br>"."url :";
       var_dump($request['url']);
       echo "</br>"."</br>";
       return;
    }



} 

?>