<?php
//extends CController
class CCodeGenerator 
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
        new $request['generate']($request);
    }

} 

?>