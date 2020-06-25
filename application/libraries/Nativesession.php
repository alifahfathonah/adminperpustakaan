<?php
if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

class Nativesession
{
    public function __construct()
    {
        session_start();
    }

    // meng Set Session
    public function set( $key, $value )
    {
        $_SESSION[$key] = $value;
    }
    // Mendapatkan Session
    public function get( $key )
    {
        return isset( $_SESSION[$key] ) ? $_SESSION[$key] : null;
    }

    public function regenerateId( $delOld = false )
    {
        session_regenerate_id( $delOld );
    }

    public function delete( $key )
    {
        unset( $_SESSION[$key] );
    }

    public function deleteArray($colomn)
    {
        foreach ($colomn as $key ) {
            unset($_SESSION[$key]);
        }
        
    }
}