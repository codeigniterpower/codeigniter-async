<?php 
 /*
 * libasync.php
 * 
 * Copyright 2018 PICCORO Lenz McKAY <mckaygehard@gmail.com>
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * 
 */
class Libasync
{
    
    public function __construct()
    {
        $this->ci =& get_instance();
    }
 
    /**
     * name: from_remote_do_remote_in_back
     * @description llamada remota empleando emulacion de datos por post
     * @param $params datos del formulario emulado o cada parametro o dato enviar como si fuera el form
     * @param $remoteurl = NULL
     * @return void
     */
    function from_remote_do_remote_in_back($params, $remoteurl = NULL)
    {
        $post_string = http_build_query($params);
        $parts = parse_url($remoteurl);
        $errno = 0;
        $errstr = "";
        // deteccion de tipo invocacion, si socket local o url remota
        $schemeurl = parse_url($remoteurl, PHP_URL_SCHEME);
        if($schemeurl == 'https')
        {
            $port = 443;
            $protocol = 'ssl://';
        }
        if($schemeurl == 'http')
        {
            $port = 80;
            $protocol = 'ssl://';
        }
        // deteccion de que controller se ha llamado (WIP)
        $methodruta = parse_url($remoteurl, PHP_URL_PATH);//$parts['path'];
        $fproc = fsockopen($protocol . $parts['host'], $port, $errno, $errstr, 30);
        $out = "POST ".$methodruta." HTTP/1.1\n";
        $out.= "Host: ".$parts['host']."\n";
        $out.= "Content-Type: application/x-www-form-urlencoded\n";
        $out.= "Content-Length: ".strlen($post_string)."\n";
        $out.= "Connection: Close\n";
        if (isset($post_string)) $out.= $post_string;
        fwrite($fproc, $out);
        fclose($fproc);
    }
}
?>
