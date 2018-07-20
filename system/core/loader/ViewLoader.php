<?php
if ( ! defined('PATH_SYSTEM')) {
    die ('Bad requested!');
}

class ViewLoader
{
    public function __construct()
    {
    }

    private $__content = [];

    public function load($view, $data = [])
    {
        extract($data);

        ob_start();

        require_once(PATH_APPLICATION . '/view/' . $view . '.php');

        $content = ob_get_contents();

        ob_end_clean();

        $this->__content[] = $content;
    }

    public function show()
    {
        foreach ($this->__content as $key => $html) {
            echo $html;
        }
    }
}