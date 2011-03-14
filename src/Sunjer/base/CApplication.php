<?php


/**
 * untitledModel - base/class.CApplication.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 08.03.2011, 14:34:05 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author Tamir Twina, <tamirtw@gmail.com>
 * @package base
 */


/**
 * include base_CComponent
 *
 * @author Tamir Twina, <tamirtw@gmail.com>
 */
require_once('base/CComponent.php');

/**
 * include Sunjer
 *
 * @author Tamir Twina, <tamirtw@gmail.com>
 */
require_once('Sunjer.php');

/* user defined includes */
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008E7-includes begin
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008E7-includes end

/* user defined constants */
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008E7-constants begin
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008E7-constants end

/**
 * Short description of class base_CApplication
 *
 * @access public
 * @author Tamir Twina, <tamirtw@gmail.com>
 * @package base
 */
class CApplication extends CComponent
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute _loadedComponents
     *
     * @access private
     */
    private $_loadedComponents;

    /**
     * Short description of attribute _params
     *
     * @access private
     */
    private $_params;

    /**
     * Short description of attribute _basePath
     *
     * @access private
     */
    private $_basePath;

    /**
     * Short description of attribute _language
     *
     * @access private
     */
    private $_language;

    /**
     * Short description of attribute charset
     *
     * @access public
     */
    public $charset;

    // --- OPERATIONS ---

    /**
     * Short description of method __get
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function __get()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000930 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000930 end
    }

    /**
     * Short description of method __isset
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function __isset()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000932 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000932 end
    }

    /**
     * Short description of method getBasePath
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function getBasePath()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000934 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000934 end
    }

    /**
     * Short description of method setBasePath
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function setBasePath()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000936 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000936 end
    }

    /**
     * Short description of method getParams
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function getParams()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000938 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000938 end
    }

    /**
     * Short description of method setParams
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function setParams()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:000000000000093A begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:000000000000093A end
    }

    /**
     * Short description of method setImport
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function setImport()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:000000000000093C begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:000000000000093C end
    }

    /**
     * Short description of method hasComponent
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function hasComponent()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:000000000000093E begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:000000000000093E end
    }

    /**
     * Short description of method getComponent
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function getComponent()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000940 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000940 end
    }

    /**
     * Short description of method setComponent
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function setComponent()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000942 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000942 end
    }

    /**
     * Short description of method preload
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function preload()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000944 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000944 end
    }

    /**
     * Short description of method setConfig
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function setConfig()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000946 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000946 end
    }

    /**
     * Short description of method run
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function run()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000948 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000948 end
    }

    /**
     * Short description of method handleException
     *
     * @abstract
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public abstract function handleException();

    /**
     * Short description of method handleRequest
     *
     * @abstract
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public abstract function handleRequest();

} /* end of class base_CApplication */

?>