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
    protected  $_cssSelector;
    
    public function __construct($cssSelector){
        $this->setDocumentLocator($cssSelector);
    }


    public function getDocumentLocator() {
        return $this->_cssSelector;
    }
    
    public function setDocumentLocator($cssSelector) {
        if(!is_string($cssSelector))
            throw new CException ('Css selector must be defined');
        $this->_cssSelector = $cssSelector;
    }
}

?>
