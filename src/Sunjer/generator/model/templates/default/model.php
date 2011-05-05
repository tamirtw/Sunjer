/*

***    **** Model Template ****
***    Created By Sunjer-Project !
***    Date <?php echo date("F j, Y, g:i a"); ?>

*/

class <?php echo $_data_['className']; ?> implements IModel{

    protected $websource;

    public function __construct(){
        $this->webSource = new WebSourceCode(<?php echo $_data_['url']['domain']; ?>,<?php var_dump($_data_['url']['get']); ?>,<?php var_dump($_data_['url']['post']);?>);
    }

    public function beforeAction(){
         <?php echo $_data_['beforeAction']; ?>
    }
    
    public function getLocators(){
        return array(
       <?php
       foreach ($_data_['selectors'] as $selector){?>
            <?php
            //if(false){
                  ?>new<?php echo "'".$selector['name']."'=>".$selector['type']."Locator('".$selector['selector']."'),<br>";} ?>
            <?php echo 'null );'; ?>
    }
    
    public function afterAction(){
        <?php echo $_data_['afterAction']; ?>
    }


}

