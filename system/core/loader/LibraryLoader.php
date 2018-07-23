<?php
if ( ! defined('PATH_SYSTEM')) {
    die ('Bad requested!');
}

class LibraryLoader
{
    public function __construct()
    {
    }

    public function load($library, $agrs = [])
    {
        if (empty($this->{$library})) {
            $class = ucfirst($library) . 'Library';

            require_once (PATH_SYSTEM.'/library/'.$class.'.php');
            $this->{$library} = new $class($agrs);
        }
    }
}