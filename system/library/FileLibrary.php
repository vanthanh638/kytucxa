<?php

class FileLibrary {

    public function __construct() {
        
    }

    public function upload($name) {
        $uploaddir = PATH_ROOT . '/images/avatar/';
        
        $uploadfile = $uploaddir . basename($_FILES[$name]['name']);
        
        $imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
        
        $newName = time() . '.' .$imageFileType;
        $pathFile = $uploaddir . $newName;
        
        if (move_uploaded_file($_FILES[$name]['tmp_name'], $pathFile)) {
            return $newName;
        } else {
            return '';
        }
    }

    public function deleteFile($name) {
        $uploaddir = PATH_ROOT.'/images/avatar/';
        $fileUrl = $uploaddir . $name;
        unlink($fileUrl);
    }

}