/*
    **** WebSource Template ****
    Created By Sunjer-Project ! 
    Date <?php echo date("F j, Y, g:i a"); ?> 
*/

class bla {
    
    public $url;
    public $get;
    public $post;

    public function __construct($url,$get,$post){
   
        $this->setUrl($url);
        $this->setGetArray($get);
        $this->setPostArray($post);
    
    }

    public function setUrl($url){
    
        $this->url = $url;
    
    }

    public function setGetArray($get){
    
        $this->get = $get;<br>
    
    }

    public function setPostArray($post){
    
        $this->post = $post;
    
    }

    public function getUrl(){
    
        return $this->url;
    
    }

    public function getGetArray(){
    
        return $this->get;
    
    }

    public function getPostArray(){
   
        return $this->post;
    
    }


}