<?php

error_reporting(E_ALL);

/**
 * untitledModel - resource/interface.IResource.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 08.03.2011, 14:34:05 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author Tamir Twina, <tamirtw@gmail.com>
 * @package resource
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000885-includes begin
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000885-includes end

/* user defined constants */
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000885-constants begin
// section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000885-constants end

/**
 * Short description of class resource_IResource
 *
 * @access public
 * @author Tamir Twina, <tamirtw@gmail.com>
 * @package resource
 */
interface resource_IResource
{


    // --- OPERATIONS ---

    /**
     * Short description of method open
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function open();

    /**
     * Short description of method save
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function save();

} /* end of interface resource_IResource */

?>