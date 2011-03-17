<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

interface IWebSource{

    public $url;
    public $get;
    public $post;

    public function __construct($url,$get,$post);
    public function setUrl($url);
    public function setGetArray($get);
    public function setPostArray($post);
    public function getUrl();
    public function getGetArray();
    public function getPostArray();





}

?>
