<?php 
if ( ! defined('PATH_SYSTEM')) {
	die ('Bad requested!');
}
 

function string_to_int($str) {
    return sprintf("%u", crc32($str));
}