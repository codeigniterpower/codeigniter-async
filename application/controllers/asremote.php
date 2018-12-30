<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * @class: asremote
 * @description: controller will be called from localhost as remote handler by the library async
 */
class asremote extends CI_Controller 
{
 
    /**
     */
    function __Construct()
    {
        parent::__construct();
    }

    /**
     *  @desc : none
     *  @param :void
     *  @return : void
     */
    public  function index()
    {
        // no necesita index.. todolo que hace esta lib es ejecutar tareas en segundo plano
        // que en realidad si se ejecutan en primer plano, pero en un opensocket tras bastidores
    }

    /**
     *  @desc : task that will be called from localhost as remote background
     *  @param :void
     *  @return : void
     */
    public function makeafileremote()
    {
        $this->load->helper('file');

        $data = $this->input->post_get('content');
        $name = $this->input->post_get('name');
        $results = write_file($name, $data, w+))
        
    }
}
