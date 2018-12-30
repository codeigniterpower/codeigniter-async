<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * @class: tocalllocal
 * @description: controller to call at localhost that will send to remotehost a call method
 */
class tocalllocal extends CI_Controller 
{
 
    /**
      * load list modal, library and helpers
      */
    function __Construct()
    {
        parent::__Construct();
    }

    /**
     *  @desc : todo
     *  @param :void
     *  @return : void
     */
    public  function index()
    {
    }

    /**
     *  @desc : Function that send remotelly by calling the library "as" background task
     *  @param customcontent String: content of the remote task to perform
     *  @return : void
     */
    public function callthelibrarytocallasremote($customcontent = "something in file")
    {
        $this->load->helper(array('form', 'url'));

        $url = base_url()."asremote/makeafileremote";

        $param = array('name' => "ver.txt", 'content' => $customcontent );

        $this->libasync->from_remote_do_remote_in_back($param, $url);
    }

}
