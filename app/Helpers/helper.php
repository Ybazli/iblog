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

if(!function_exists('setEnvironmentValue')){
    /**
     * @param array
     * @return bool
     */
    function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

                $str .= "\n";
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }
}






