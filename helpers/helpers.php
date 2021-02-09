<?php

if( ! function_exists('dd') ) {
    function dd() {

        foreach (func_get_args() as $key => $arg) {
            if ($key > 0) {
                echo '---------------------------------------------------------';
            }
            echo '<pre>';
            print_r($arg);
            echo '</pre>';
        }

        die();
    }
}

if( ! function_exists('dump') ) {
    function dump($data) {
        foreach (func_get_args() as $key => $arg) {
            if ($key > 0) {
                echo '---------------------------------------------------------';
            }
            echo '<pre>';
            print_r($arg);
            echo '</pre>';
        }
    }
}


if( ! function_exists('assets') ) {
    function assets($path) {
       return url() . '/' . $path;
//       echo dirname(__DIR__).'/public/'.$path;
    }
}

if( ! function_exists('url') ) {
    function url() : string {
        return 'http://' . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
    }
}

