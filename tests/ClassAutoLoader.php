<?php

class ClassAutoLoader {

    /**
     * @var ClassAutoLoader object
     */
    private static $_instance = null;
    /**
     *
     * @var array key/value pair className=>classPath
     */
    private $_classMap = array();
    /**
     *
     * @var string root path to search for classes
     */
    private $_searchPath;


    private function __construct($sDirectory=null) {
        $this->setSearchPath($sDirectory);
        $this->generateClassMap();
    }

    public static function load($sDirectory=null) {
        if (null === $_instance)
            $_instance = new ClassAutoLoader($sDirectory);
        return $_instance;
    }

    private function generateClassMap() {
        $oFiles = new RecursiveIteratorIterator(
                        new RecursiveDirectoryIterator(
                                $this->_searchPath
                                , RecursiveIteratorIterator::SELF_FIRST));
        foreach ($oFiles as $fileInfo)
            $this->_classMap[$fileInfo->getBasename('.php')] = $fileInfo->getPathname();
    }

    private function setSearchPath($sPath) {
        if (null === $sPath)
            $sPath = dirname(__FILE__);
        $this->_searchPath = realpath($sPath);
    }

    /**
     * Registers this class with the spl autloader stack.
     *
     * @return bool
     */
    public function register() {
        return spl_autoload_register(array(&$this, 'autoload'));
    }

    /**
     * Autloads classes, if they can be found in the class file maps associated
     * with this autoloader.
     *
     * @param string $sClass
     * @return string the class name if found, otherwise false
     */
    public function autoload($sClass) {
        if (class_exists($sClass, false) || interface_exists($sClass))
            return false;
        if(array_key_exists($sClass,$this->_classMap))
            include_once $this->_classMap[$sClass];
        return true;
    }

}

ClassAutoLoader::load(dirname(__FILE__).'/../src')->register();


