<?php

abstract class CController extends CApplicationComponent
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute _layout
     *
     * @access protected
     * @var String
     */
    protected $_layout = null;

    // --- OPERATIONS ---

    /**
     * Short description of method renderInternal
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function renderInternal($_viewFile_,$_data_=null,$_return_=false)
    {
        echo "bla";
                if(is_array($_data_))
                        extract($_data_,EXTR_PREFIX_SAME,'data');
                else
                        $data=$_data_;
                if($_return_)
                {
                        ob_start();
                        ob_implicit_flush(false);
                        require($_viewFile_);
                        return ob_get_clean();
                }
                else
                        require($_viewFile_);
    }

    /**
     * Short description of method render
     *
     * @access public
     * @author Tamir Twina, <tamirtw@gmail.com>
     * @return mixed
     */
    public function render()
    {
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000874 begin
        // section 10-10--91-60-7f09995f:12e75e0bc39:-8000:0000000000000874 end
    }

} /* end of abstract class base_CController */

?>