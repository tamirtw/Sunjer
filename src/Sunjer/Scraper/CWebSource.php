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
    
    public function __construct($url=NULL,$get=array(),$post=array()){
        //TODO ask Eli if in the extention we can assume that the url is one of those :
        //http://www.walla.co.il/ , http://www.walla.co.il/key=value
        //www.walla.co.il/ , www.walla.co.il/key=value
       

        $this->setURL($url);
        $this->setGetValues($get);

        //setPostValues is optionsl , you can add them later.
        $this->setPostValues($post);
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
         $this->post = $post;
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
        if(preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i',$this->url) > 0)
            $this->parsingUrl ($this->url);
        else
            throw new CException('URL is not Valid');
    }

    public function parsingUrlAndInsertGetValues($url){
        //This is an optional function that Sunjer is provide for you
        //if our parse is not ok for your use , you can change it .
        
        $parse = parse_url($url);
        if(array_key_exists('scheme',$parse))
            return $this->url=$parse['scheme'].'://'.$parse['host'].'/';
        else
            return $this->url=strstr($url, '/',true);
    }
}

?>
