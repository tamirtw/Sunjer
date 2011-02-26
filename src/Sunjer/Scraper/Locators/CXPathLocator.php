<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CXPathLocator
 *
 * @author tamir
 */
class CXPathLocator implements ILocator{
    protected  $_xpathQuery;
        
    public function __construct($xql){
        $this->setDocumentLocator($xql);
    }


    public function getDocumentLocator() {
        return $this->_xpathQuery;
    }
    
    public function setDocumentLocator($xql) {
        if(!is_string($xql))
            throw new CException ('Xpath query must be defined');
        $this->_xpathQuery = $xql;
    }
}

?>
