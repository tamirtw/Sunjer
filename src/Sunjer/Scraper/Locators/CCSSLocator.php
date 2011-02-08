<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CCSSLocator
 *
 * @author tamir
 */
class CCSSLocator implements ILocator{
    protected  $cssSelector;
    
    public function __construct($cssSelector){
        $this->setDocumentLocator($cssSelector);
    }


    public function getDocumentLocator() {
        return $this->cssSelector;
    }
    
    public function setDocumentLocator($cssSelector) {
        $this->cssSelector = $cssSelector;
    }
}

?>
