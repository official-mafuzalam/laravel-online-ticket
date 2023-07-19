<?php

if (!function_exists('p')) {
    function p($data){

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


// terminal command
// composer dump-autoload