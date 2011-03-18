<?php
//extends CController
class CCodeGenerator
{
    public $code = null;

    public function  __construct($jsonFile) {
        $this->code = array();
        $json = file_get_contents($jsonFile);
        $json = json_decode($json, true);

        //TODO for_each loop that handle all request's in json !!
        foreach($json['requests'] as $request){
                $this->generate($request);
                $this->code[$request['generate'].",".$request['className']];
            }
        $this->statusAfterGenerate();

    }

    public function generate($request)
    {
        $GClass = new $request['generate']();
        $status = $GClass->prepare($request);

        $this->code[$request['generate'].",".$request['className']] = ($status ? "True":"False");
    }

    public function statusAfterGenerate(){
        print_r($this->code);
           
    }

} 
?>