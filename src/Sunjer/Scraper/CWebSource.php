<?php

/**
 * Description of CWebSource
 *
 * @author tamir
 */
include 'CException.php';

class CWebSource {
    
    protected $url;
    protected $get;
    protected $post;
    
    public function __construct($url=NULL,$get=NULL,$post=NULL){
        $this->setURL($url);
        $this->setGetValues($get);
        //setPostValues is optionsl , you can add them later.
        $this->setGetValues($post);
    }

    public function setURL($url){
//        if($this->isValidURL($url))
        $this->url = $url;
    }

    public function setGetValues($get){
        if(is_array($get))
        $this->get = $get;
        else throw new CException('Get is not array');
    }

    public function setPostValues($post){
        if(is_array($post))
        $this->get = $post;
        else throw new CException('Post is not array');
    }

    public function getUrl(){
        return $this->url;
    }

    public function getGetValues(){
        return $this->get;
    }

    public function getPostValues(){
        return $this->post;
    }

    public function isValidURL()
    {
//        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
        throw new CException('URL is not Valid');
        
    }
}

?>
