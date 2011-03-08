<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of jsonParse
 *
 * @author dex
 */
class jsonParse {
    //put your code here
    protected $jsonFile;

    public function  __construct($file) {
        $this->jsonFile = array('appID'=>'','url'=>'','selector'=>'','beforeAction'=>'','afterAction'=>'');
        $json = file_get_contents($file);
        $json_en = json_decode($json, true);
        $this->printAll($json_en);
        $this->setJSONValues($json_en);
        
    }  

    public function setJSONValues($json){
        $this->jsonFile['appID'] = $json['appID'];
        $this->jsonFile['url'] = array('domain'=>$json['url']['domain'],'get'=>array(),'post'=>array());
        $this->jsonFile['selectors'] = array();
      
        foreach($json['url']['get'] as $get){
            array_push($this->jsonFile['url']['get'],$get);
        }

        foreach($json['url']['post'] as $post){
            array_push($this->jsonFile['url']['post'],$post);
        }

        foreach($json['selectors'] as $selector){
            array_push($this->jsonFile['selectors'],$selector);
        }
               
        $this->jsonFile['beforeAction'] = $json['beforeAction'];
        $this->jsonFile['afterAction'] = $json['afterAction'];

        $this->printAll($this->jsonFile);
        
    }

    public function printAll($file){
        echo "</br>"."</br>"."</br>";
        echo "appID :".$file['appID'];
        echo "</br>"."</br>"."url :";
        var_dump($file['url']);
        echo "</br>"."selectors : ";
        var_dump($file['selectors']);
        echo "</br>"."</br>";
        echo "Before Action :".$file['beforeAction'];
        echo "</br>"."</br>";
        echo "After Action :".$file['afterAction'];
    }

}
?>
