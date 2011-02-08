<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XPathLocator
 *
 * @author tamir
 */
class XPathLocator implements ILocator{
    protected  $xpathXql;
    
    public function __construct($xql){
        $this->setDocumentLocator($xql);
    }


    public function getDocumentLocator() {
        return $this->xpathXql;
    }
    
    public function setDocumentLocator($xql) {
        $this->xpathXql = $xql;
    }
}

?>
