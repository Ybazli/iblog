<?php


if(!function_exists('extractId')){
    /**
     * @param String $string
     * @return array
     */
    function extractId($string){
//        return array_map('intval', explode(',', $string));
        return explode(',', $string);

    }
}