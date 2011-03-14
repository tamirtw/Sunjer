<?php
//include 'CCodeModel.php';

class CCodeGenerator //extends CController
{
 
    public $code = null;

   
    public function  __construct($jsonFile) {
    
    $json = file_get_contents($jsonFile);
    $this->code = json_decode($json, true);

    //TODO for_each loop that handle all request's in json !!
    foreach($this->code['requests'] as $request){
            $this->generate($request);
        }
    
    }
    public function generate($request)
    {
    //TODO $Variable Variable ! :)
        switch ($request['generate']) {
            case 'websource':
                $webSource = new WebSourceCode($request);
                break;
            case 'model':
                $model = new ModelCode($request);
                break;
            case 'scenario':
                $app = new AppCode($request);
                break;
            case 'app':
                $scenario = new ScenarioCode($request);
                break;
            default:
                echo "ERROR - Unkown Class ! ! !</br>";
                break;
                }
      
    }

} 

?>