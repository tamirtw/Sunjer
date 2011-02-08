<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CRangeLocator
 *
 * @author tamir
 */
class CRangeLocator implements ILocator{
    protected  $rangeLocator;
    
    public function __construct($fromLocator,$toLocator){
        
        //TODO check both vars are ILocators
        
    }


    public function getDocumentLocator() {
        
    }
    
    public function setDocumentLocator($fromLocator,$toLocator) {
        
    }
}

?>
