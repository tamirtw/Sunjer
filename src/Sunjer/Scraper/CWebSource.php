<?php

/**
 * Description of CWebSource
 *
 * @author tamir
 */


class CWebSource {
    
    protected $url;
    protected $post;
    protected $get;
    
    public function __construct($url=NULL,$get = NULL,$post = NULL){
        $this->url = $url;
        //TODO check url isn't null
        //TODO check url is valid 
        //TODO parse url with get values to get array
        //TODO get array values are int,string,IModel
        //TODO post array values are int,string,IModel
    }
    
    public function getUrl(){
        return $this->url;
    }
    
    public function setUrl();
    
    public function setGetVariables();
    public function getGetVariables();
    public function setPostVariables();
    public function getPostVariables();
    
    
    

}

?>
