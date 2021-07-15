<?php 
if (!function_exists('create_folder')) {
    /**
     * Return the base URL to use in views
     * 
     * @param string $dir
     *
     * @return string
     * added by ilham 03.11.2020
     */
    function create_folder($dir='')
    {
        $result = true;

        if($dir != '') {
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
        } else {
            $result = false;
        }

        return $result;
    }
}