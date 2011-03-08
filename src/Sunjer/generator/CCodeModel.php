<?php

error_reporting(E_ALL);

/**
 * untitledModel - generator/class.CCodeModel.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 08.03.2011, 14:34:05 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author Tamir Twina, <tamirtw@gmail.com>
 * @package generator
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include generator_CCodeGenerator
 *
 * @author Tamir Twina, <tamirtw@gmail.com>
 */
require_once('generator/class.CCodeGenerator.php');

/**
 * include resource_CFileResource
 *
 * @author Tamir Twina, <tamirtw@gmail.com>
 */
require_once('resource/class.CFileResource.php');

/* user defined includes */
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000892-includes begin
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000892-includes end

/* user defined constants */
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000892-constants begin
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000892-constants end

/**
 * Short description of class generator_CCodeModel
 *
 * @abstract
 * @access public
 * @author Tamir Twina, <tamirtw@gmail.com>
 * @package generator
 */
abstract class generator_CCodeModel
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute warnings
     *
     * @access public
     */
    public $warnings[ null | null | null ];

    /**
     * Short description of attribute template
     *
     * @access public
     * @var String
     */
    public $template = null;

    /**
     * Short description of attribute file
     *
     * @access public
     * @var CFileResource
     */
    public $file = null;

    /**
     * Short description of attribute status
     *
     * @access public
     */
    public $status[ null | null | null ];

    // --- OPERATIONS ---

    /**
     * Short description of method prepare
     *
     * @abstract
     * @access protected
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    protected abstract function prepare();

    /**
     * Short description of method generate
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function generate()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008AF begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008AF end
    }

    /**
     * Short description of method successMessage
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function successMessage()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008BE begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008BE end
    }

    /**
     * Short description of method errorMessage
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function errorMessage()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008C0 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008C0 end
    }

    /**
     * Short description of method getTemplatePath
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function getTemplatePath()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008C2 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008C2 end
    }

    /**
     * Short description of method validateTemplate
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function validateTemplate()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008C4 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:00000000000008C4 end
    }

} /* end of abstract class generator_CCodeModel */

?>