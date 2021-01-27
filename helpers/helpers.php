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