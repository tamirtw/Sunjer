<?php


class WebSourceCode extends CCodeModel
{
    public $warnings;
    public $template = null;
    public $file = null; //CFileResource
    public $status;

    public function  __construct($request)
    {
//        $this->printJsonValues($request);
        $this->prepare($request);
    }

    protected function prepare($request)
    {
        //This Function Prepare Json & Validate Values !
        //TODO ASK ELI WHY file_exists not working ?!
        if($this->validateTemplate()){
            $this->generate($request, $this->getTemplatePath());
        }
        
        else $this->errorMessage("CFT");
    }

    public function getTemplatePath()
    {
        //Where is the Path to the template
        return dirname(__FILE__)."/templates/default/websource.php";
    }

    public function generate($request,$path)
    {
        echo "here";
         $this->renderInternal($this->getTemplatePath());
        //$render->renderInternal($path,$request);
        //Setting values in the template
        //TODO call RenderInternal;
    }
  
    public function validateTemplate()
    {
        //validateTemplate
        return file_exists($this->getTemplatePath());
      
    }

    public function successMessage()
    {
        echo "This Template Was Create Succsefully"."<br>"."<br>";
    }

    public function errorMessage($error)
    {
        switch ($error){
            case 'CFT':
                echo 'Cannot Find Template<br>';
                break;
            default:
                echo 'Unkown Error<br>';
                break;

        }
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
    public function renderInternal($_viewFile_,$_data_=null,$_return_=false)
    {
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