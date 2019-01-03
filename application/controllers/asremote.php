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
    public function makeafileremote($name = null, $data = '')
    {
        $this->load->helper('file');

        $data = $this->input->get_post('content');
        $name = $this->input->get_post('name');
        $sussess = 'not yet';

        log_message('info', __CLASS__ . '/'. __METHOD__ .' received: '. $name . ', '.$data );
        $results = write_file($name, $data, 'w+');
        log_message('error', __CLASS__ . '/'. __METHOD__ .' file lib'. print_r($results, true) );

        if($results)
        {
            $fileinfo = get_file_info($name,'server_path');
            $sussess = $fileinfo['server_path'];
        }   
        log_message('error', __CLASS__ . '/'. __METHOD__ .' '.$sussess);
        
    }
}
