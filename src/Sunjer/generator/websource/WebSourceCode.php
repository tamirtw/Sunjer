<?php


class WebSourceCode extends CCodeModel
{
    public $warnings;
    public $template = null;
    public $file = null; //CFileResource
    public $status;

    public function  __construct($request)
    {
//        $this->file = new CFileResource;
        $this->printJsonValues($request);
        $this->prepare($request);

    }

    protected function prepare($request)
    {
        //This Function Prepare Json & Validate Values !
        //if validate is OK move to GenerateTemplate
        $path = $this->getTemplatePath();
        $this->generate($request, $path);

    }

    public function getTemplatePath()
    {
        //Where is the Path to the template
        return 'default/websource.php';
    }

    public function generate($request,$path)
    {
        //Setting values in the template
        //TODO call RenderInternal;
    }
  
    public function validateTemplate()
    {
        //validateTemplate
    }

    public function successMessage()
    {

    }

    public function errorMessage()
    {

    }

    public function printJsonValues($request)
    {
       echo $request['generate']."</br>";
       echo "className: ".$request['className']."</br>";
       echo "appID :".$request['appID'];
       echo "</br>"."</br>"."url :";
       var_dump($request['url']);
       echo "</br>"."selectors : ";
       var_dump($request['selectors']);
       echo "</br>"."</br>";
       echo "Before Action :".$request['beforeAction'];
       echo "</br>"."</br>";
       echo "After Action :".$request['afterAction'];
       echo "</br>"."</br>";
    }

} 

?>