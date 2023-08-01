<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: amalesh
 * Date: 3/27/16
 * Time: 1:01
 */

class Asynchcall{
    public function executeBackground( $controller, $method, $params, $secure_connection = true )
    {
        $ci = &get_instance( );
        $url = site_url('AsynchCall');
        $parts = parse_url($url);

        $port = 80;
        $host = $parts['host'];

        if ( ( $fp = fsockopen( $host, $port, $errno, $errstr, 30 ) ) === FALSE )
        {
            throw new Exception( "Internal server error: background process could not be started" );
        }

        $data[0] = $controller;
        $data[1] = $method;
        $data[2] = $params;
        $post_string = "data=" . urlencode( $ci->encrypt->encode( serialize( $data ) ) );
        $out = "POST " . $parts['path'] . " HTTP/1.1\r\n";
        $out .= "Host: " . $host . "\r\n";
        $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out .= "Content-Length: " . strlen( $post_string ) . "\r\n";
        $out .= "Connection: Close\r\n\r\n";
        $out .= $post_string;
        fwrite( $fp, $out );
        fclose( $fp );
    }
} 