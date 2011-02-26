<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Render {

        /**
         * Renders a view file.
         * This method includes the view file as a PHP script
         * and captures the display result if required.
         * @param string $_viewFile_ view file
         * @param array $_data_ data to be extracted and made available to the view file
         * @param boolean $_return_ whether the rendering result should be returned as a string
         * @return string the rendering result. Null if the rendering result is not required.
         */
        public function renderInternal($_viewFile_,$_data_=null,$_return_=false)
        {
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
}

$r = new Render();

$r->renderInternal('testView.php',array('title'=>'bla','code'=>23));
?>
