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
        //return json_encode($this->code);
        $this->statusAfterGenerate();

    }

    public function generate($request)
    {
        $GClass = new $request['generate']($request);
        $status = $GClass->prepare($request);

        $this->code[$request['generate'].",".$request['className']] = ($status ? "True":"False");
        
    }

    public function statusAfterGenerate(){
        echo "Status : Foreach Request  (Type,Name) : True if Success , False If Faliure Generate Class !<br><br><br>";
        print_r($this->code);
           
    }

} 
?>