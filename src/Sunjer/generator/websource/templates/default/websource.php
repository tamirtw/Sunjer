<br><br>
/*

***    **** WebSource Template ****
***    Created By Sunjer-Project !
***    Date <?php echo date("F j, Y, g:i a"); ?>

*/

class <?php echo $_data_['className']; ?> implements IWebSource{

    public $url = <?php echo $_data_['url']['domain']; ?>;
    public $get = <?php var_dump($_data_['url']['get']); ?>;
    public $post= <?php var_dump($_data_['url']['post']); ?>;

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