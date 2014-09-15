<?php defined('kexec') or die('Restricted access');

class VirtualDirectory
{
    var $protocol;
    var $site;
    var $thisfile;
    var $real_directories;
    var $num_of_real_directories;
    var $virtual_directories = array();
    var $num_of_virtual_directories = array();
    var $baseURL;
    var $thisURL;

    function VirtualDirectory()
    {
        //$this->protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
        $this->protocol = 'http';
        $this->site = $this->protocol . '://' . $_SERVER['HTTP_HOST'];
        $this->thisfile = basename($_SERVER['SCRIPT_FILENAME']);
        $this->real_directories = $this->cleanUp(explode("/", str_replace($this->thisfile, "", $_SERVER['PHP_SELF'])));
        $this->num_of_real_directories = count($this->real_directories);
        $this->virtual_directories = array_diff($this->cleanUp(explode("/", str_replace($this->thisfile, "", $_SERVER['REQUEST_URI']))),$this->real_directories);
        $this->num_of_virtual_directories = count($this->virtual_directories);
        //$this->baseURL = $this->site . "/" . implode("/", $this->real_directories) . "/";
        $this->baseURL = $this->site . "/" . implode("/", $this->real_directories) . "";
        $this->thisURL = $this->baseURL . implode("/", $this->virtual_directories) . "/";
    }

    function cleanUp($array)
    {
        $cleaned_array = array();
        foreach($array as $key => $value)
        {
            $qpos = strpos($value, "?");
            if($qpos !== false)
            {
                break;
            }
            if($key != "" && $value != "")
            {
                $cleaned_array[] = $value;
            }
        }
        return $cleaned_array;
    }
}
