<?php


if(!function_exists('extractId')){
    /**
     * @param String $string
     * @return array
     */
    function extractId($string){

        return explode(',', $string);

    }
}
if(!function_exists('adminPrefix')){
    /**
     * @return String
     */
    function adminPrefix()
    {
        return config('iblog.admin-prefix');
    }
}

if(!function_exists('blogPrefix')){
    /**
     * @return String
     */
    function blogPrefix()
    {
        return config('iblog.blog-prefix');
    }
}

